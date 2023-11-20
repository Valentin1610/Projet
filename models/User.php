<?php 

require_once  __DIR__ . '/../config/databaseController.php';

class User {
    private int $id_user;
    private string $username;
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

    public function get_username() :string{
        return $this->username;
    }
    public function set_username(string $username){
        $this->username = $username;
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
        $sql = "INSERT INTO `users` (`username`, `email`, `password` ,`profil`)
        VALUES (:username, :email, :password, :profil);";
        $sth= $pdo->prepare($sql);
        $sth->bindValue(':username', $this->get_username());
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
        `username` = :username,
        `email` = :email,
        `password` = :password,
        `profile` = :profile
        WHERE `id_user` = :id_user";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':username', $this->get_username());
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

    public static function getByUsername(string $username)
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `users` WHERE `username` =:username ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':username', $username);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public static function ifExists(string $username, string $email){

        $pdo = Database::connect();
        $sql = "SELECT `users`.`username`, `users`.`email` FROM `users` WHERE `username` = :username OR `email` = :email;";
        $sth=$pdo->prepare($sql);
        $sth->bindValue(':username',$username);
        $sth->bindValue(':email',$email);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    } 
}