<?php

require __DIR__ . '/../config/databaseController.php';

class Console
{
    private int $id_consoles;
    private string $name;
    private string $picture;

    public function get_id_consoles(): int
    {
        return $this->id_consoles;
    }
    public function set_id_consoles(int $id_consoles)
    {
        $this->id_consoles = $id_consoles;
    }

    public function get_name(): string
    {
        return $this->name;
    } 

    public function set_name(string $name)
    {
        $this->name = $name;
    }


    public function get_picture() :string
    {
        return $this->picture;
    }
    public function set_picture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function add(): bool
    {
        $pdo = connect();
        $sql = "INSERT INTO `consoles` (`name`, `picture`) VALUES (:name, :picture)";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $this->get_name());
        $sth->bindValue(':picture', $this->get_picture());
        $result =  $sth->execute();

        return $result;
    }
}
