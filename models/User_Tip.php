<?php

require_once __DIR__ . '/../config/databaseController.php';

class User_Tip
{
    private int $id_user;
    private int $id_tips;

    public function get_id_user(): int
    {
        return $this->id_user;
    }
    public function set_id_user(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function get_id_tips(): int
    {
        return $this->id_tips;
    }
    public function set_id_tips(int $id_tips)
    {
        $this->id_tips = $id_tips;
    }

    // Méthode pour insérer une astuce en favori

    public function insert(int $id_user, int $id_tips) 
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO `users_tips` (`id_user`, `id_tips`)
        VALUES (:id_user, :id_tips);";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sth->bindParam(':id_tips', $id_tips, PDO::PARAM_INT);
        $sth->execute();
    }

    // Méthode pour récupérer les informations et afficher en favori

    public static function getFav(): array
    {

        $pdo = Database::connect();
        $sql = "SELECT `users_tips`.*, `tips`.`tip`, `tips`.`description_tip`
        FROM `users_tips`
        JOIN `tips` ON  `users_tips`.`id_tips` = `tips`.`id_tips`;";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    // Méthode pour supprimer l'astuce dans la liste des favoris

    public static function delete(int $id_user, int $id_tips) :bool
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM `users_tips` WHERE `id_tips` = :id_tips AND `id_user` = :id_user;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_tips', $id_tips, PDO::PARAM_INT);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    } 
}
