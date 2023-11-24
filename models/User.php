<?php 

require_once  __DIR__ . '/../config/databaseController.php';

class User {
    private int $id_user;
    private string $user;
    private string $email;
    private string $password;
    private ?string $profile;
    private int $role;

    public function get_id_user() :int{
        return $this->id_user;
    }
    public function set_id_user(int $id_user){
        $this->id_user = $id_user;
    }

    public function get_user() :string{
        return $this->user;
    }
    public function set_user(string $user){
        $this->user = $user;
    }

    public function get_email() :string{
        return $this->email;
    }
    public function set_email(string $email){
        $this->email = $email;
    }

    public function get_password() :string{
        return $this->password;
    }
    public function set_password(string $password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function get_profile() :string{
        return $this->profile;
    }
    public function set_profile(string $profile){
        $this->profile = $profile;
    }

    public function get_role() :int{
        return $this->role;
    }
    public function set_role(int $role){
        $this->role = $role;
    }

    // Création d'une nouvelle méthode pour ajouter un utilisateur
    public function add() :bool{

        $pdo = Database::connect();
        $sql = "INSERT INTO `users` (`user`, `email`, `password` ,`profil`)
        VALUES (:user, :email, :password, :profil);";
        $sth= $pdo->prepare($sql);
        $sth->bindValue(':user', $this->get_user());
        $sth->bindValue(':email', $this->get_email());
        $sth->bindValue(':password', $this->get_password());
        $sth->bindValue(':profil', $this->get_profile());
        $result = $sth->execute();

        return (bool) $result;
    }

    public static function get(int $id_user){

        $pdo = Database::connect();
        $sql = "SELECT * FROM `users`
        WHERE `id_user` = :id_user;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result; 
    }

    public function update() :array{

        $pdo = Database::connect();
        $sql = "UPDATE `users` SET 
        `user` = :user,
        `email` = :email,
        `password` = :password,
        `profile` = :profile
        WHERE `id_user` = :id_user";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':user', $this->get_user());
        $sth->bindValue(':email', $this->get_email());
        $sth->bindValue(':password', $this->get_password());
        $sth->bindValue(':profile', $this->get_profile());
        $sth->bindValue(':id_user', $this->get_id_user(), PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll();
        return $result;
    }

    public static function get_all() :array{

        $pdo = Database::connect();

        $sql = "SELECT * FROM `users`";
        $sth= $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function getByuser(string $user)
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `users` WHERE `user` =:user ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':user', $user);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public static function ifExists(string $user, string $email){

        $pdo = Database::connect();
        $sql = "SELECT COUNT(*) FROM `users` WHERE `user` = :user OR `email` = :email;";
        $sth=$pdo->prepare($sql);
        $sth->bindParam(':user',$user);
        $sth->bindParam(':email',$email);
        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    } 
}