<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Verbeck DEGBESSE
 */
class DB {
    private $host='localhost';
    private $username='root';
    private $database='ampayeur';
    private $password='';
    private $db;
    
    
//    private $host='192.168.1.113';
//    private $port='5432';
//    private $username='devop';
//    private $database='peroMarket';
//    private $password='dev0p';
//    private $db;
    
   public function __construct($host=null,$username=null,$password=null,$database=null){
        if($host !=null){
            $this->host=$host;
              $this->username=$username;
                $this->password=$password;
                  $this->database=$database;
//                  $this->port=$port;
        }
        try{
            $this->db=new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->username,
                $this->password,array(
                        PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8',
                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
                        ));
            
//             $this->db=new PDO('pgsql:host='.$this->host.':'.$port.';dbname='.$this->database,$this->username,
//                $this->password,array(
//                        PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8',
//                        PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
//                        ));
        } catch (PDOException $ex) {
            die("<h1>Impossible de se connecter à la base de données</h1>");
        }    
}

/*La fonction permettant d'executer les requetes */
public function query($sql,$data=array()){
    $req=$this->db->prepare($sql);
    $req->execute($data);
    return $req->fetchAll(PDO::FETCH_OBJ);
}

}
