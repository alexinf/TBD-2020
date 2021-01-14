<?php

class Administrador extends Controller
{
    public function index()
    {
        $rol_id = 1;
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
            print_r('hola entro ak');
            var_dump($e);
        }

        $this->view('administrador/index', ['data'=>$data]);
    }

    public function rol($rol_id)
    {
        $data = [];

        if (!isset($rol_id)) {
            header('Location: http://localhost/administrador/');
            die();
        }
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT data_rol(?)');
            $stmt->execute([$rol_id]);
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($datas) == 0) {
                $data = 0;
            } else {
                foreach ($datas as $d) {
                    $std = json_decode($d['data_rol']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            var_dump($e);
        }

        $this->view('administrador/rol',['data'=>$data]);
    }

    public function roles()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $roles = $link->query('SELECT traer_roles()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($roles) == 0) {
                $data = 0;
            } else {
                foreach ($roles as $rol) {
                    $std = json_decode($rol['traer_roles']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        $this->view('administrador/roles',['roles'=>$data]);
    }

    public function usuarios()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $users = $link->query('SELECT listar_usuarios()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($users) == 0) {
                $data = 0;
            } else {
                foreach ($users as $user) {
                    $std = json_decode($user['listar_usuarios']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://localhost/home/error/');
            die();
            //var_dump($e);
        }
        $this->view('administrador/usuarios', ['users'=>$data]);
    }

    public function usuario($usuario)
    {
        $userdb;
        $roles = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT ver_usuario(?)');
            $stmt->execute([$usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $userdb = json_decode($user['ver_usuario']);
            $rols = $link->query('SELECT obtener_allroles()')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rols as $rol) {
                array_push($roles, json_decode($rol['obtener_allroles']));
            }
        } catch (PDOException $e) {
            header('Location: http://localhost/home/error/');
            die();
            //var_dump($e);
        }
        $this->view('administrador/usuario', ['roles'=>$roles,'usr'=>$userdb]);
    }

    public function actualizar_usuario()
    {
        //var_dump($_POST);

    }

    public function crear_usuario()
    {
        $data = [];
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $roles = $link->query('SELECT preparar_usuario()')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($roles as $role) {
                array_push($data, json_decode($role['preparar_usuario']));
            }
        } catch (PDOException $e) {
            //die();
            //var_dump($e);
        }
        $this->view('administrador/crear_usuario', ['roles'=>$data]);
    }

    public function guardar_usuario()
    {
        if (empty($_POST)) {
            header('Location: http://localhost/');
            die();
        }

        if (!isset($_POST['rol'])) {
            header('Location: http://localhost/administrador');
            die();
        }

        $roles = [];
        foreach ($_POST['rol'] as $k => $v) {
            if (!is_array($v)) {
                header('Location: http://localhost/home/error/no_array');
                die();
            }
            array_push($roles, [$k,$v['active']]);
        }
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT guardar_usuario(?,?)');
            $stmt->execute([$_POST['username'], $_POST['password']]);
            $usr_id = $stmt->fetch(PDO::FETCH_ASSOC);
            $usr_id = $usr_id['guardar_usuario'];

            $stmt2 = $link->prepare('INSERT INTO usuario_rol (usuario,rol,activo) VALUES (?,?,?)');
            // insert multi-rows
            foreach ($roles as $rol) {
                array_unshift($rol, $usr_id);
                $stmt2->execute($rol);
            }
            header('Location: http://localhost/administrador');
            die();
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function eliminar_usuarios()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $users = $link->query('SELECT listar_usuarios()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($users) == 0) {
                $data = 0;
            } else {
                foreach ($users as $user) {
                    $std = json_decode($user['listar_usuarios']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://localhost/home/error/');
            die();
        }
        $this->view('administrador/eliminar_usuarios', ['users'=>$data]);
    }

    public function eliminar($usuario)
    {
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT eliminar_usuario(?)');
            $stmt->execute([$usuario]);
            header('Location: http://localhost/administrador');
            die();
        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}
