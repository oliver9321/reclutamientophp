<?php

class CandidatoIdiomasModel
{
    private $pdo;

    public $Id;
    public $CandidatoId;
    public $IdiomaId;
    public $Otro;
    public $Estado;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Create (CandidatoIdiomasModel $data)
    {
        try
        {
            $sql = "INSERT INTO candidato_idiomas (CandidatoId,IdiomaId,Otro,Estado)
		        VALUES (?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->IdiomaId,
                        $data->Otro,
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

    public function Update(CandidatoIdiomasModel $data)
    {
        try
        {
            $sql = "UPDATE candidato_idiomas SET
						CandidatoId  = ?,
                        IdiomaId = ?,
                        Otro = ?,
						Estado = ?
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->CandidatoId,
                        $data->IdiomaId,
                        $data->Otro,
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