<?php 

require_once __DIR__ . '/../config/databaseController.php';

class Category{
    private int $id_types;
    private string $type;

    public function get_id_types() : int {
        return $this->id_types; 
    }
    public function set_id_types(int $id_types){
        $this->id_types = $id_types;
    }

    public function get_type() : string{
        return $this->type;
    }
    public function set_type(string $type){
        $this->type = $type;
    } 

    public function new() : bool
    {
        $pdo =Database::connect();
        $sql = 'INSERT INTO `categories` (`type`) VALUES (:type) ;' ;
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type());
        $result = $sth->execute();
        
        return $result; 
    }

    public static function ifExist(string $type) : bool
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `categories`
        WHERE `type` = :type ;";
        $sth= $pdo->prepare($sql);
        $sth->bindValue(':type', $type);
        $sth->execute();
        $result = $sth->fetch();

        return (bool) $result;
    }

    public static function getall() :array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `categories`;";
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();

        return $result;
    }

    public static function get(int $id_types)
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `categories` WHERE `id_types` = :id_types";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public function update() :bool
    {
        $pdo = Database::connect();
        $sql = "UPDATE `categories` SET `type` = :type WHERE `id_types` = :id_types ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type());
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id_types) :bool
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM `categories` WHERE `id_types` = ?;";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id_types]);
        return (bool) $sth->rowCount();
    }
}