<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class NivelCapacitacionesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new nivelCapacitacionesModel();
    }

    public function Index(){

            GetRouteView(null, "header");
            GetRouteView("nivelcapacitaciones", "index");
            GetRouteView(null, "footer");

    }

    public function View(){
        echo json_encode($this->model->View());
    }

    public function Edit(){

           $nivelCapacitacion = $this->model;

            if (isset($_REQUEST['Id'])) {
                $nivelCapacitacion = $this->model->Edit($_REQUEST['Id']);
            }

            GetRouteView(null, "header");
            require_once 'View/nivelcapacitaciones/edit.php';
            GetRouteView(null, "footer");

    }

    public function Save(){

        $nivelCapacitacion = new nivelCapacitacionesModel();

        $nivelCapacitacion->Id = $_REQUEST['Id'];
        $nivelCapacitacion->Descripcion = $_REQUEST['Descripcion'];
        $nivelCapacitacion->Estado = $_REQUEST['Estado'];

        $nivelCapacitacion->Id > 0
            ? $this->model->Update($nivelCapacitacion)
            : $this->model->Create($nivelCapacitacion);

        header('Location:index.php?c=nivelcapacitaciones&a=index');
    }

}