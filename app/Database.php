<?php

namespace App;
use \PDO;

class Database{

    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $pdo;

    public function __construct($db_name, $db_user='victor', $db_pass='password01100', $db_host='localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

    }

    private function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'victor', 'password01100');
            // Affiche les erreur PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);

        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function prepare($statement, $attributes, $one = true, $fetch = true ){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        // var_dump($req);die;
        if ($fetch === true) {
            $req->setFetchMode(PDO::FETCH_OBJ);
            if ($one) {
                $datas = $req->fetch();
            } else {
                $datas = $req->fetchAll();
            }
            return $datas;
        } else {
            header("Location: index.php");
        }
    }
}