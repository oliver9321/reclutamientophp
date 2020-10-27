<?php

class nivelCapacitacionesModel
{
    private $pdo;

    public $Id;
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

    public function View()
    {
        try
        {
                $stm = $this->pdo->prepare("SELECT * FROM nivel_capacitaciones");
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
            $stm = $this->pdo
                ->prepare("SELECT *  FROM nivel_capacitaciones WHERE Id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Update(nivelCapacitacionesModel $data)
    {
        try
        {
            $sql = "UPDATE nivel_capacitaciones SET
                        Descripcion  = ?,
						Estado = ?
				    WHERE Id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Descripcion,
                        (int)$data->Estado,
                        $data->Id
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (nivelCapacitacionesModel $data)
    {
        try
        {
            $sql = "INSERT INTO nivel_capacitaciones (Descripcion,Estado)  VALUES (?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Descripcion,
                        $data->Estado
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListNivelesCapacitaciones()
    {
        try
        {
            $result = array();
 
            $stm = $this->pdo->prepare("SELECT * FROM nivel_capacitaciones WHERE Estado = 1");
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