<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function in()
    {
        var_dump($_POST['username']);
        if(empty($_POST)) {
            header('Location: http://localhost');
            die();
        }

        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: http://localhost');
            die();
        }

        #die();
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT login(?,?)');
            $stmt->execute([$_POST['username'], $_POST['password']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $stdClass = json_decode($user['login']);
            $this->processingUser($stdClass);
        } catch (PDOException $e) {
            #var_dump($e);
            #die();
            header('Location: http://localhost/home/error/NO_USER_FOUND');
            #header($_POST['username']);

            //var_dump($e);
        }
    }

    public function processingUser($user = null)
    {
        if (empty($user)) {
            header('Location: http://localhost/home/error/');
            die();
        }
        $_SESSION['usr'] = $user;
        header('Location: http://localhost/');
        die();
    }

    public function logout()
    {
        $user = $_SESSION['usr']->usuario;
        $pid = $_SESSION['usr']->pid;
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT logout(?,?)');
            $stmt->execute([$user, $pid]);
        } catch (PDOException $e) {
            header('Location: http://localhost/home/error/');
            die();
            //var_dump($e);
        }
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(),'',-4200,'/');
        }
        session_unset();    // Destruimos las variables de sesión
        session_destroy();
        header('Location: http://localhost/');
        die();
    }
}
