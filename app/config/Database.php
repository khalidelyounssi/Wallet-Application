<?php



class Database {
    private $host = "localhost";
    private $db_name = "wallets";
    private $username = "root";
    private $password = "";

    public $conn ;

    public function getConnection(){
        $this-> conn = null ;
        

        try{

            $this->conn = new PDO ( "mysql:host".$this->host.";db_name=".$this->db_name,
            $this->username,
            $this->password);

            $this->conn->setAttribute ( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $this->conn->exec("set names utf");

        } catch(PDOException $ex){
           echo "erreur de connexion  " . $ex->getMessage();
                }


    }
}