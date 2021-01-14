<?php 

class Estudiante extends Controller
{
    public function index()
    {
        $rol_id = 2;
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
            header('Location: http://localhost/estudiante/');
            die();
        }
        $this->view('director/index', ['data'=>$data]);
    }

}
