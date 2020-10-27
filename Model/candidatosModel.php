<?php

class CandidatosModel
{
    private $pdo;

    public $Id;
    public $PuestoId;
    public $Cedula;
    public $Nombre;
    public $SalarioAspira;
    public $RecomendadoPor;
    public $FechaCreacion;
    public $CreadoPor;
    public $Estado;
    public $UsuarioId;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function View()
    {
        try
        {

                $stm = $this->pdo->prepare("SELECT *  FROM vw_candidatos");
                $stm->execute();

               $row = $stm->fetchAll();

                $response = array();
                $response['success'] = true;
                $response['aaData'] = $row;

                return $response;

        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Edit($id)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT *  FROM candidatos WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function Update(CandidatosModel $data)
    {

        try
        {
            $sql = "UPDATE candidatos SET
						PuestoId  = ?,
                        Cedula = ?,
                        Nombre = ?,
                        SalarioAspira = ?,
                        RecomendadoPor = ?,
						Estado = ?
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PuestoId,
                        $data->Cedula,
                        $data->Nombre,
                        $data->SalarioAspira,
                        $data->RecomendadoPor,
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

    public function Create (CandidatosModel $data)
    {
        print_r($data); exit;
        try
        {
            $sql = "INSERT INTO candidatos (PuestoId,Cedula,Nombre,SalarioAspira,RecomendadoPor,FechaCreacion,CreadoPor,Estado,UsuarioId)
		        VALUES (?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PuestoId,
                        $data->Cedula,
                        $data->Nombre,
                        $data->SalarioAspira,
                        $data->RecomendadoPor, 
                        $data->FechaCreacion,
                        (int)$data->CreadoPor,
                        1,
                        (int)$data->UsuarioId
                    )
                );

            $LastUsuarioID = $this->pdo->lastInsertId();

            if($LastUsuarioID){

           /* foreach($data->PuestoId as $value){

                $sql2 = "INSERT INTO pv_usuarios_puestos (UsuarioID,PuestoId,CreadoPorUsuarioID,FechaCreacion,Estado)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $LastUsuarioID,
                            $value,
                            (int)$data->CreadoPorUsuarioID,
                            $data->FechaCreacion,
                            1
                        )
                    );

            }*/

            }

            return true;


        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function GetListCandidatos()
    {
        try
        {
            $result = array();
 
            $stm = $this->pdo->prepare("SELECT * FROM vw_candidatos WHERE Estado = 1");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $result[] = $r;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}