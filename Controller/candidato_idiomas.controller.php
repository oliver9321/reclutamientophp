<?php

require_once 'Config/Core.php';
require_once 'Model/models.php';

class CandidatoIdiomasController
{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new CandidatoIdiomasModel();
    }

    public function Save(){

        $this->model->Id = $_REQUEST['Id'];
        $this->model->CandidatoId = $_REQUEST['CandidatoId'];
        $this->model->IdiomaId = $_REQUEST['IdiomaId'];
        $this->model->Otro = $_REQUEST['Otro'];
        $this->model->Estado = $_REQUEST['Estado'];

        $this->model->Id > 0
            ? $this->model->Update($this->model)
            : $this->model->Create($this->model);

        header('Location:index.php?c=candidato_idiomas&a=index');
    }

}