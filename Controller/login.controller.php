<?php
require_once 'Config/Core.php';
require_once 'Model/models.php';

class loginController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new LoginModel();
    }

    public function Index(){
        GetRouteView("login", "index");
    }

    public function ValidateUser(){

        if(isset($_REQUEST['Correo']) && isset($_REQUEST['Clave'])){

            $login = new LoginModel();

            $login->Correo  = $_REQUEST['Correo'];
            $login->Clave = $this->encryptIt($_REQUEST['Clave'], KEY);
            $returnResponse =  $this->model->login($login);
          
            if($returnResponse){

                $_SESSION['DataUserOnline'] = $returnResponse;

                //$Puesto = $returnResponse['Correo']->Puesto;

                    header('Location: index.php?c=dashboard&a=index');

            }else{
                echo '<script>alert("Correo invalido, No posee permisos o Clave invalida"); setTimeout(function(){ window.location.href = "index.php?c=Login&a=index"; }, 100);</script>';

            }
        }else{
            echo '<script>alert("Correo invalido, No posee permisos o Clave invalida"); setTimeout(function(){ window.location.href = "index.php?c=Login&a=index"; }, 100);</script>';
        }

    }

    public function Logout(){

        if(isset($_SESSION)){
            session_destroy();
        }
        header('Location: index.php?c=login&a=index');
    }

    function encryptIt($string, $key) {

           $result = '';
           for($i=0; $i<strlen($string)*5; $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)+ord($keychar));
              $result.=$char;
           }
           return base64_encode($result);
}


}