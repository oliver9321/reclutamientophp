<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class CandidatoCapacitacionesController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CandidatoCapacitacionesModel();
    }

    public function Save(){

        $this->model->Id = $_REQUEST['Id'];
        $this->model->CandidatoId = $_REQUEST['CandidatoId'];
        $this->model->NivelID = $_REQUEST['NivelID'];
        $this->model->Descripcion = $_REQUEST['Descripcion'];
        $this->model->FechaDe = $_REQUEST['FechaDe'];
        $this->model->FechaHasta = $_REQUEST['FechaHasta'];
        $this->model->Institucion = $_REQUEST['Institucion'];
        $this->model->Estado = $_REQUEST['Estado'];

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:index.php?c=candidato_capacitaciones&a=index');
    }

}