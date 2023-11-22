<?php

require_once __DIR__ . '/../config/databaseController.php';

class Console
{
    private int $id_consoles;
    private string $console;
    private string $logo;
    private string $id_types;

    public function get_id_consoles(): int
    {
        return $this->id_consoles;
    }
    public function set_id_consoles(int $id_consoles)
    {
        $this->id_consoles = $id_consoles;
    }

    public function get_console(): string
    {
        return $this->console;
    } 

    public function set_console(string $console)
    {
        $this->console = $console;
    }


    public function get_logo() :string
    {
        return $this->logo;
    }
    public function set_logo(string $logo)
    {
        $this->logo = $logo;
    }

    public function get_id_types(): int
    {
        return $this->id_types;
    }
    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public function add(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `consoles` (`console`, `logo`) 
        VALUES (:console, :logo)';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':console', $this->get_console());
        $sth->bindValue(':logo', $this->get_logo());
        $result =$sth->execute();

        return $result;
    }
    public static function ifExist(string $console) : bool
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `consoles`
        WHERE `console` = :console ;";
        $sth= $pdo->prepare($sql);
        $sth->bindValue(':console', $console);
        $sth->execute();
        $result = $sth->fetch();

        return (bool) $result;
    }

    public static function getAll() :array
    {
        $pdo = Database::connect();
        $sql ='SELECT * FROM `consoles`;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();

        return $result;
    }

    public static function get_all_consoles3D($id_types):array
    {
        $pdo = Database::connect();
        $sql = "SELECT `consoles`. `id_consoles`, `consoles`. `console`, `consoles` . `logo`, `consoles`. `id_types` 
        FROM `consoles`
        WHERE `id_types` = :id_types;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll();
        return $result;

    }

    public static function get($id_consoles){

        $pdo = Database::connect();
        $sql = "SELECT * FROM `consoles` WHERE `id_consoles` = :id_consoles;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_consoles', $id_consoles, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();


        return $result;
    }

    public static function get_all_consoles(int $id_types){

        $pdo = Database::connect();
        $sql = "SELECT `consoles`. `console`, `consoles`.`logo`, `consoles`. `id_consoles` FROM `consoles`
        WHERE `id_types` = :id_types;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll();
        return $result;
    }

    public function update() :bool
    {
    $pdo = Database::connect();
    $sql = "UPDATE `consoles` SET `console` = :console, `logo` = :logo 
    WHERE `id_consoles` = :id_consoles;";
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':console', $this->get_console());
    $sth->bindValue(':logo', $this->get_logo());
    $sth->bindValue(':id_consoles', $this->get_id_consoles(), PDO::PARAM_INT);
    return $sth->execute();

    }

    public static function delete(int $id_consoles)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM `consoles` WHERE `id_consoles` = `id_consoles`;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_consoles', $id_consoles, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}