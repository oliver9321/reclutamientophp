<?php

class CandidatoCapacitacionesModel
{
    private $pdo;

    public $Id;
    public $CandidatoId;
    public $NiveId;
    public $Descripcion;
    public $FechaDe;
    public $FechaHasta;
    public $Institucion;
    public $Estado;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Create (CandidatoCapacitacionesModel $data)
    {
        try
        {
            $sql = "INSERT INTO candidato_capacitaciones (CandidatoId,NiveId,Descripcion,FechaDe,FechaHasta,Institucion,Estado)
		        VALUES (?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->NiveId,
                        $data->Descripcion,
                        $data->FechaDe,
                        $data->FechaHasta, 
                        $data->Institucion,
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

    public function Update(CandidatoCapacitacionesModel $data)
    {
        try
        {
            $sql = "UPDATE candidato_capacitaciones SET
						CandidatoId  = ?,
                        NiveId = ?,
                        Descripcion = ?,
                        FechaDe = ?,
                        FechaHasta = ?,
                        Institucion = ?,
						Estado = ?
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->NiveId,
                        $data->Descripcion,
                        $data->FechaDe,
                        $data->FechaHasta,
                        $data->Institucion,
                        (int)$data->Estado,
                        $data->Id
                    )
                );

            return true;

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

}