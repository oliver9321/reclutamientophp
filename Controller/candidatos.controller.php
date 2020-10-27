<?php
require_once 'Config/Core.php';
require_once 'Model/models.php';

class CandidatosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CandidatosModel();
    }

    public function Index(){

        GetRouteView(null, "header");
        require_once 'View/candidatos/index.php';
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
        $this->model = $this->model;
        $Puestos = new PuestosModel();
       // $PuestosByUser = "";
       // $PuestosArray = $Puestos->GetListPuestos();

        if(isset($_REQUEST['Id'])){

            $this->model =  $this->model->Edit($_REQUEST['Id']);
           // $PuestosByUser =  $Puestos->GetListPuestosByUser($_REQUEST['Id']);
        }

       GetRouteView(null, "header");
       require_once 'View/candidatos/edit.php';
       GetRouteView(null, "footer");
     /*  if($_SESSION['DataUserOnline']['Empleados']->Perfil == "Administrador") {
        }else{
            header('Location:index.php?c=login&a=index');
        }*/
    }

    public function Save()
    {

        if (isset($_REQUEST['Cedula']) || isset($_REQUEST['PuestoId'])) {
          
            $this->model->Id                  = $_REQUEST['Id'];
            $this->model->PuestoID            = $_REQUEST['PuestoID'];
            $this->model->Cedula              = $_REQUEST['Cedula'];
            $this->model->SalarioAspira       = $_REQUEST['SalarioAspira'];
            $this->model->RecomendadoPor      = $_REQUEST['RecomendadoPor'];
            $this->model->Estado = $_REQUEST['Estado'];
            $this->model->FechaCreacion = date('Y-m-d');

            if ($this->model->Id > 0) {

                $Message =  $this->model->Update($this->model);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "/index.php?c=candidatos&a=Edit&Id="+$this->model->Id+"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=candidatos&a=index');
                }

            } else {

                $Message = $this->model->Create($this->model);

                if ($Message != "1") {
                    echo '<script>alert("' . $Message . '"); setTimeout(function(){ window.location.href = "../index.php"; }, 100);</script>';
                } else {
                    header('Location:index.php?c=candidatos&a=index');
                }
            }

        } else {
            header('Location:index.php?c=candidatos&a=Edit');
        }
    }

}