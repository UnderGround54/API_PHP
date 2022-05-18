<?php
class Database{
   private $host = "127.0.0.1";
   private $db_name = "getudiant";
   private $username = "root";
   private $password = "";
   public $conn;

   public function getConnection(){
       $this->conn = null;
       try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
       }catch(PDOException $exeption){
            echo " Base de donnée non connecté : ".$exeption->getMessage();
       }
       return $this->conn;
   }
}
?>