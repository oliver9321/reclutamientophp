<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class IdiomasController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new IdiomasModel();
    }

    public function Index(){

            GetRouteView(null, "header");
            GetRouteView("idiomas", "index");
            GetRouteView(null, "footer");

    }

    public function View(){
        echo json_encode($this->model->View());
    }

    public function Edit(){

           $Idioma = $this->model;

            if (isset($_REQUEST['Id'])) {
                $Idioma = $this->model->Edit($_REQUEST['Id']);
            }

            GetRouteView(null, "header");
            require_once 'View/idiomas/edit.php';
            GetRouteView(null, "footer");

    }

    public function Save(){

        $Idioma = new IdiomasModel();

        $Idioma->Id = $_REQUEST['Id'];
        $Idioma->Nombre = $_REQUEST['Nombre'];
        $Idioma->Estado = $_REQUEST['Estado'];

        $Idioma->Id > 0
            ? $this->model->Update($Idioma)
            : $this->model->Create($Idioma);

        header('Location:index.php?c=idiomas&a=index');
    }

}