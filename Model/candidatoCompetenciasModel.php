<?php

class CandidatoCompetenciasModel
{
    private $pdo;

    public $Id;
    public $CandidatoId;
    public $Descripcion;
    public $Estado;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Create (CandidatoCompetenciasModel $data)
    {
        try
        {
            $sql = "INSERT INTO candidato_competencias (CandidatoId,Descripcion,Estado)
		        VALUES (?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->Descripcion,
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

    public function Update(CandidatoCompetenciasModel $data)
    {
        try
        {
            $sql = "UPDATE candidato_competencias SET
						CandidatoId  = ?,
                        Descripcion = ?,
						Estado = ?
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->Descripcion,
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