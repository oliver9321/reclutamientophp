<?php

class PuestosModel
{
    private $pdo;

    public $Id;
    public $DepartamentoId;
    public $Nombre;
    public $NivelRiesgo;
    public $NivelMinimoSalario;
    public $NivelMaximoSalario;
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
               $stm = $this->pdo->prepare("SELECT * FROM vw_puestos_departamentos");
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
            $stm = $this->pdo->prepare("SELECT *  FROM puestos WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Update(PuestosModel $data)
    {

        try
        {
            $sql = "UPDATE puestos SET
                        DepartamentoId  = ?,
						Nombre          = ?,
                        NivelRiesgo     = ?,
						NivelMinimoSalario = ?,
						NivelMaximoSalario = ?,
                        Estado = ?
				    WHERE Id = ?";

            $resp = $this->pdo->prepare($sql);
            $resp->execute([$data->DepartamentoId,$data->Nombre,$data->NivelRiesgo,$data->NivelMinimoSalario, $data->NivelMaximoSalario,(int)$data->Estado,(int) $data->Id]);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (PuestosModel $data)
    {
        try
        {
            $sql = "INSERT INTO puestos (DepartamentoId,Nombre,NivelRiesgo,NivelMinimoSalario,NivelMaximoSalario,Estado) VALUES (?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->DepartamentoId,
                        $data->Nombre,
                        $data->NivelRiesgo,
                        $data->NivelMinimoSalario,
                        $data->NivelMaximoSalario,
                        1
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListPuestos()
    {
        try
        {
            $result = array();
            $Puestos = new PuestosModel();

            $stm = $this->pdo->prepare("SELECT * FROM vw_puestos_departamentos WHERE Estado = 1");
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