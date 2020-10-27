<?php
require_once 'Config/Core.php';
require_once 'Model/models.php';

class UsuariosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new UsuariosModel();
    }

    public function Index(){
        GetRouteView(null, "header");
        require_once 'View/usuarios/index.php';
        GetRouteView(null, "footer");
    }

    public function View(){
        echo json_encode($this->model->View(), true);
    }

    public function Edit(){

        $Usuario = new UsuariosModel();

        if(isset($_REQUEST['Id'])){
            $Usuario =  $this->model->Edit($_REQUEST['Id']);
            $Usuario->Clave = trim($this->decryptIt($Usuario->Clave, KEY));
        }

       GetRouteView(null, "header");
       require_once 'View/usuarios/edit.php';
       GetRouteView(null, "footer");
    }

    public function Save()
    {
        if (isset($_REQUEST['Nombre']) || isset($_REQUEST['Usuario'])) {

            $Usuario = new UsuariosModel();

            $Usuario->Id        = $_REQUEST['Id'];
            $Usuario->Nombre    = $_REQUEST['Nombre'];
            $Usuario->Apellido  = $_REQUEST['Apellido'];
            $Usuario->Clave     = $this->encryptIt($_REQUEST['Clave'], KEY);
            $Usuario->Correo    = $_REQUEST['Correo'];
            $Usuario->Telefono  = $_REQUEST['Telefono'];
            $Usuario->Rol       = $_REQUEST['Rol'];
            $Usuario->Estado    = $_REQUEST['Estado'];

            $Usuario->FechaCreacion = date('Y-m-d');

            if ($Usuario->Id > 0) {

                $Message =  $this->model->Update($Usuario);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "/index.php?c=usuarios&a=Edit&Id="+$Usuario->Id+"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=usuarios&a=index');
                }

            } else {

                $Message = $this->model->Create($Usuario);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "../index.php"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=usuarios&a=index');
                }
            }

        } else {
            header('Location:index.php?c=usuarios&a=Edit');
        }
    }

      function encryptIt($string, $key) {

           $result = "";

           for($i=0; $i<strlen($string)*5; $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)+ord($keychar));
              $result.=$char;
           }

           return base64_encode($result);
    }


    function decryptIt($string, $key) {

           $result = '';
           $string = base64_decode($string);
           for($i=0; $i<strlen($string); $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($key, ($i % strlen($key))-1, 1);
              $char = chr(ord($char)-ord($keychar));
              $result.=$char;
           }
           return $result;
        }

}