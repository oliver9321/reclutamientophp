<?php

class IdiomasModel
{
    private $pdo;

    public $Id;
    public $Nombre;
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
                $stm = $this->pdo->prepare("SELECT * FROM idiomas");
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
            $stm = $this->pdo->prepare("SELECT *  FROM idiomas WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Update(IdiomasModel $data)
    {
        try
        {
            $sql = "UPDATE idiomas SET Nombre  = ?, Estado = ? WHERE Id = ?";
            $resp = $this->pdo->prepare($sql);
            $resp->execute([$data->Nombre, (int)$data->Estado, $data->Id]);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Create (IdiomasModel $data)
    {
        try
        {
            $sql = "INSERT INTO idiomas (Nombre,Estado) VALUES (?,?)";
            $this->pdo->prepare($sql)->execute(array($data->Nombre, 1));

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function GetListIdiomas()
    {
        try
        {
            $result = array();
 
            $stm = $this->pdo->prepare("SELECT * FROM idiomas WHERE Estado = 1");
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