<?php
require_once 'Config/Core.php';
require_once 'Model/models.php';

class EmpleadosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new EmpleadosModel();
    }

    public function Index(){

        GetRouteView(null, "header");
        require_once 'View/empleados/index.php';
        GetRouteView(null, "footer");

       /* if($_SESSION['DataUserOnline']['Empleados']->Perfil == "Administrador") {

        }else{
            header('Location:index.php?c=login&a=index');
        }*/
    }

    public function View(){

        echo json_encode($this->model->View(), true);
       /* if($_SESSION['DataUserOnline']['Empleados']->Perfil == "Administrador") {
        
        }else{
            header('Location:index.php?c=login&a=index');
        }*/
    }

    public function Edit(){

        //Instancias de clases
        $Empleados = new EmpleadosModel();
        $Puestos = new PuestosModel();
       // $PuestosByUser = "";
          $PuestosArray = $Puestos->GetListPuestos();

        if(isset($_REQUEST['Id'])){

            $Empleados =  $this->model->Edit($_REQUEST['Id']);
           // $PuestosByUser =  $Puestos->GetListPuestosByUser($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/empleados/edit.php';
       GetRouteView(null, "footer");
     /*  if($_SESSION['DataUserOnline']['Empleados']->Perfil == "Administrador") {
        }else{
            header('Location:index.php?c=login&a=index');
        }*/
    }

    public function Save()
    {

        if (isset($_REQUEST['CandidatoId']) || isset($_REQUEST['Empleados'])) {

            $Empleados = new EmpleadosModel();

            $Empleados->Id           = $_REQUEST['Id'];
            $Empleados->PuestoID     = $_REQUEST['PuestoID'];
            $Empleados->CandidatoId  = $_REQUEST['CandidatoId'];
            $Empleados->FechaIngreso = $_REQUEST['FechaIngreso'];
            $Empleados->Salario      = $_REQUEST['Salario'];
         
            $Empleados->Estado = $_REQUEST['Estado'];
            $Empleados->FechaCreacion = date('Y-m-d');

            if ($Empleados->Id > 0) {

                $Message =  $this->model->Update($Empleados);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "/index.php?c=empleados&a=Edit&Id="+$Empleados->Id+"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=empleados&a=index');
                }

            } else {

                $Message = $this->model->Create($Empleados);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "../index.php"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=empleados&a=index');
                }
            }

        } else {
            header('Location:index.php?c=empleados&a=Edit');
        }
    }

}