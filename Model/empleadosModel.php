<?php

class EmpleadosModel
{
    private $pdo;

    public $Id;
    public $PuestoID;
    public $CandidatoId;
    public $FechaIngreso;
    public $Salario;
    public $FechaCreacion;
    public $CreadoPor;
    public $Estado;

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

                $stm = $this->pdo->prepare("SELECT *  FROM vw_empleados");
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
            $stm = $this->pdo->prepare("SELECT *  FROM empleados WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function Update(EmpleadosModel $data)
    {
        try
        {
            $sql = "UPDATE empleados SET
						PuestoID  = ?,
                        CandidatoId = ?,
                        FechaIngreso = ?,
                        Salario = ?,
						Estado = ?
				    WHERE Id = ?";


            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PuestoID,
                        $data->CandidatoId,
                        $data->FechaIngreso,
                        $data->Salario,
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

    public function Create (EmpleadosModel $data)
    {
        try
        {
            $sql = "INSERT INTO empleados (PuestoID,CandidatoId,FechaIngreso,Salario,FechaCreacion,CreadoPor,Estado)
		        VALUES (?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->PuestoID,
                        $data->CandidatoId,
                        $data->FechaIngreso,
                        $data->Salario,
                        $data->FechaCreacion,
                        (int)$data->CreadoPor,
                        1
                    )
                );

            $LastEmpleadoID = $this->pdo->lastInsertId();

            if($LastEmpleadoID){

           /* foreach($data->PuestoID as $value){

                $sql2 = "INSERT INTO pv_usuarios_puestos (UsuarioID,PuestoID,CreadoPorUsuarioID,FechaCreacion,Estado)
		        VALUES (?,?,?,?,?)";

                $this->pdo->prepare($sql2)
                    ->execute(
                        array(
                            $LastEmpleadoID,
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



}