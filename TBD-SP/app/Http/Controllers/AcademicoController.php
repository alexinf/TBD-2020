<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicoController extends Controller
{
    public function proyectos()
    {
        $data = [];
        $id = Auth::User()->id;
        // aprovechando la relacion Proyecto-Usuario (tabla pivote)
        $proyectos = \App\Usuario::find($id)->proyectos;

        if (!empty($proyectos)) {
            foreach ($proyectos as $proyecto) {
                // obtengo el nombre del status del proyecto mediante la
                // relacion que proyecto tiene con proyecto_status table
                // ver modelo Proyecto
                $status_name = $proyecto->proyecto_status->name;
                $titulo_proyecto = \App\ProyectoDetalle::where(
                    'proyecto_id',
                    $proyecto->id
                )->get()->first()->titulo_proyecto;

                array_push($data, [
                    'id'=> $proyecto->id,
                    'titulo' => $titulo_proyecto,
                    'status' => $status_name
                ]);
            }
        }

        return view('academico.proyectos', ['proyectos'=>$data]);
    }

    public function proyecto()
    {
        $tipos = \App\TipoProyecto::all();
        $dependencias = \App\DependenciaAcademica::all();
        $areas = \App\AreaAcademica::all();
        return view('academico.proyecto', [
            'tipos' => $tipos,
            'dependencias' => $dependencias,
            'areas' => $areas
        ]);
    }

    public function store_proyecto(Request $request)
    {
        //$input = $request->all();
        //var_dump($input);
        $titulo = $request->input('titulo');
        $resumen = $request->input('resumen');
        $tipo = $request->input('tipo');
        $dependencia = $request->input('dependencia');
        $area = $request->input('area');
        //var_dump($titulo,$resumen,$tipo,$dependencia,$area);

        $proyecto = \App\Proyecto::create([
            'tipo_proyecto_id' => $tipo,
            'dependencia_academica_id' => $dependencia,
            'proyecto_status_id' => 5, // por defecto el status es pendiente verificacion
            'area_academica_id' => $area
        ]);

        $id = Auth::User()->id;

        // fill proyecto_usuario
        $proyecto->usuarios()->attach($id, ['activo'=>true]);

        // fill proyecto_detalle
        \App\ProyectoDetalle::create([
            'proyecto_id' => $proyecto->id,
            'titulo_proyecto' => $titulo,
            'resumen_proyecto' => $resumen
        ]);

        return redirect()->route('academico.proyectos');
    }
}
