<?php

class DepartamentosModel
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

                $stm = $this->pdo->prepare("SELECT * FROM departamentos");
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
                ->prepare("SELECT *  FROM departamentos WHERE Id = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Update(DepartamentosModel $data)
    {
        try
        {
            $sql = "UPDATE departamentos SET Descripcion  = ?, Estado = ?
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

    public function Create (DepartamentosModel $data)
    {
        try
        {
            $sql = "INSERT INTO departamentos (Descripcion,Estado)
		        VALUES (?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Descripcion,
                        1
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListDepartamentos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM departamentos WHERE Estado = 1");
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