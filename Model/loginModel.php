<?php

class LoginModel
{
    private $pdo;

    public $Correo;
    public $Clave;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function login(LoginModel $data){

        $RsArrayUsuario = array();
  
        try
        {
            /*--------------------------------LOGIN-------------------------------------------*/

            $myusername = stripslashes($data->Correo);
            $mypassword = stripslashes($data->Clave);
            
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios  WHERE Correo = ? AND Clave = ?  AND Estado = 1 LIMIT 1");

            $stm->execute(array(
                $myusername,
                $mypassword
            ));


            $RsArrayUsuario = $stm->fetch(PDO::FETCH_OBJ);
           
            if($RsArrayUsuario){

                return $RsArrayUsuario;

            }else{
                return $RsArrayUsuario;
            }


        } catch (Exception $e)
        {
            return $RsArrayUsuario;
            die($e->getMessage());
        }

    }

}