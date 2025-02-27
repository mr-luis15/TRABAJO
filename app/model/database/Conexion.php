<?php

class Conexion
{

    
    private $HOST = "mysql-climapolardll.alwaysdata.net";
    private $USER = "382391";
    private $PASSWORD = "climapolar_12345";
    private $DBNAME = "climapolardll_nva";
    

    /*
    private $HOST = "localhost";
    private $USER = "admin";
    private $PASSWORD = "12345";
    private $DBNAME = "nueva";
    */
    
    /**
     * Datos ftp
     * 
     * ftp-climapolardll.alwaysdata.net
     * climapolardll
     * 
     */

    public function conexion() {

        try {

            $PDO = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DBNAME, $this->USER, $this->PASSWORD);
            return $PDO;

        } catch(PDOException $e) {

            echo "<script>alert('Hubo un error de conexion: ".$e->getMessage()."');</script>";
            return $e->getMessage();

        }
    }

}


