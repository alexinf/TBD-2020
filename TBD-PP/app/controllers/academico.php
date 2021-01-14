<?php

class Academico extends Controller
{
    public function index()
    {
        $rol_id = 4;
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT funcion_ui(?)');
            $stmt->execute([$rol_id]);
            $pre_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($pre_data) == 0) {
                $data = 0;
            } else {
                foreach ($pre_data as $funcion_ui) {
                    array_push($data, json_decode($funcion_ui['funcion_ui']));
                }
            }

        } catch (PDOException $e) {
            #print_r('entro a exception');
            header('Location: http://localhost/academico/');
            die();
        }

        $this->view('academico/index', ['data'=>$data]);
    }

    public function mis_proyectos()
    {
        var_dump("desarrollando");
    }

    public function nuevo_proyecto()
    {
       var_dump("desarrollando");
    }

    public function crear_proyecto()
    {
        var_dump("desarrollo");
    }
}
