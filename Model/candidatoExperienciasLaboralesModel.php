<?php

class candidatoExperienciasLaboralesModel
{
    private $pdo;

    public $Id;
    public $CandidatoId;
    public $Empresa;
    public $PuestoOcupado;
    public $FechaDesde;
    public $FechaHasta;
    public $Salario;
    public $Estado;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Create (candidatoExperienciasLaboralesModel $data)
    {
        try
        {
            $sql = "INSERT INTO candidato_experiencias_laborales (CandidatoId,Empresa,PuestoOcupado,FechaDesde,FechaHasta,Salario,Estado)
		        VALUES (?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->Empresa,
                        $data->PuestoOcupado,
                        $data->FechaDesde,
                        $data->FechaHasta,
                        $data->Salario,
                        1
                    )
                );

            $LastUsuarioID = $this->pdo->lastInsertId();

            return true;


        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function Update(candidatoExperienciasLaboralesModel $data)
    {
        try
        {
            $sql = "UPDATE candidato_experiencias_laborales SET
						CandidatoId  = ?,
                        Empresa = ?,
						PuestoOcupado = ?,
                        FechaDesde = ?,
                        Estado = ?,
                        FechaHasta = ?,
                        Salario = ?,
                        Estado = ?,
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->Empresa,
                        $data->PuestoOcupado,
                        $data->FechaDesde,
                        $data->FechaHasta,
                        $data->Salario,
                    )
                );

            return true;

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

}