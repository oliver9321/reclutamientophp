<?php

class UsuariosModel
{
    private $pdo;

    public $Id;
 
    public $Nombre;
    public $Apellido;
    public $Clave;
    public $Correo;
    public $Telefono;
    public $Rol;
    public $Estado;
    public $FechaCreacion;

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
                $stm = $this->pdo->prepare("SELECT * FROM usuarios");
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
            $stm = $this->pdo->prepare("SELECT *  FROM usuarios WHERE Id = ?");
            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function Update(UsuariosModel $data)
    {

        try
        {
            $sql = "UPDATE usuarios SET					
                        Nombre = ?,
                        Apellido = ?,
                        Clave = ?,
                        Correo = ?,
                        Telefono = ?,
                        Rol = ?,
						Estado = ?
				    WHERE Id = ?";

            $resp = $this->pdo->prepare($sql);
            $resp->execute([$data->Nombre, $data->Apellido, $data->Clave, $data->Correo, $data->Telefono, $data->Rol, (int)$data->Estado, $data->Id]);

           return true;

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function Create (UsuariosModel $data)
    {

        try
        {
            $sql = "INSERT INTO usuarios (Nombre,Apellido,Clave,Correo,Telefono,Rol,FechaCreacion,Estado)  VALUES (?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Nombre,
                        $data->Apellido,
                        $data->Clave,
                        $data->Correo,
                        $data->Telefono,
                        $data->Rol,
                        $data->FechaCreacion,
                        (int)$data->Estado,
                    )
                );

            return true;

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }



}