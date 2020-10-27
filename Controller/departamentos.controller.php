<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class DepartamentosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new DepartamentosModel();
    }

    public function Index(){

        GetRouteView(null, "header");
        GetRouteView("departamentos", "index");
        GetRouteView(null, "footer");
      /* if(isset($_SESSION['DataUserOnline']) && $_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

   
        }else{
            header('Location:index.php?c=login&a=index');}*/
    }

    public function View(){
        echo json_encode($this->model->View());
            /* if(isset($_SESSION['DataUserOnline']) && $_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {
               
            }else{header('Location:index.php?c=login&a=index');}*/
    }

    public function Edit(){
        
        $Departamento = $this->model;
        if(isset($_REQUEST['Id'])){
            $Departamento = $this->model->Edit($_REQUEST['Id']);
        }

        GetRouteView(null, "header");
        require_once 'View/departamentos/edit.php';
        GetRouteView(null, "footer");
      /* if(isset($_SESSION['DataUserOnline']) && $_SESSION['DataUserOnline']['Usuario']->Perfil == "Administrador") {

         }else{header('Location:index.php?c=login&a=index');}*/
    }

    public function Save(){


        $this->model->Id = $_REQUEST['Id'];
        $this->model->Descripcion = $_REQUEST['Descripcion'];
        $this->model->Estado = $_REQUEST['Estado'];

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:?c=departamentos&a=index');
    }

}