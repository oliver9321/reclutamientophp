<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class CandidatoExperienciasLaboralesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CandidatoExperienciasLaboralesModel();
    }

    public function Save(){

        $this->model->Id = $_REQUEST['Id'];
        $this->model->CandidatoId   = $_REQUEST['CandidatoId'];
        $this->model->Empresa       = $_REQUEST['Empresa'];
        $this->model->PuestoOcupado = $_REQUEST['PuestoOcupado'];
        $this->model->FechaDesde    = $_REQUEST['FechaDesde'];
        $this->model->FechaHasta    = $_REQUEST['FechaHasta'];
        $this->model->Salario       = $_REQUEST['Salario'];
        $this->model->Estado        = $_REQUEST['Estado'];

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:index.php?c=candidato_experiencias_laborales&a=index');
    }

}