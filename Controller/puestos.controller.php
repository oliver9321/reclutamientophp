<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class PuestosController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new PuestosModel();
    }

    public function Index(){

            GetRouteView(null, "header");
            GetRouteView("puestos", "index");
            GetRouteView(null, "footer");

    }

    public function View(){
        echo json_encode($this->model->View());
    }

    public function Edit(){

            $Departamento = new DepartamentosModel();
            $DepartamentoList = $Departamento->GetListDepartamentos();
            $Puesto = $this->model;

            if (isset($_REQUEST['Id'])) {
                $Puesto = $this->model->Edit($_REQUEST['Id']);
            }

            GetRouteView(null, "header");
            require_once 'View/puestos/edit.php';
            GetRouteView(null, "footer");

    }

    public function Save(){

        if (isset($_REQUEST['Nombre'])) {

            $Puesto = new PuestosModel();

            $Puesto->Id = $_REQUEST['Id'];
            $Puesto->DepartamentoId = $_REQUEST['DepartamentoId'];
            $Puesto->Nombre = $_REQUEST['Nombre'];
            $Puesto->NivelRiesgo = $_REQUEST['NivelRiesgo'];
            $Puesto->NivelMinimoSalario = $_REQUEST['NivelMinimoSalario'];
            $Puesto->NivelMaximoSalario = $_REQUEST['NivelMaximoSalario'];
            $Puesto->Estado = $_REQUEST['Estado'];

            $Puesto->Id > 0
                ? $this->model->Update($Puesto)
                : $this->model->Create($Puesto);

            header('Location:index.php?c=puestos&a=index');
        }else{
            header('Location:index.php?c=puestos&a=edit');
        }
    }

}