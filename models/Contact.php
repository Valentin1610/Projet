<?php 

require_once __DIR__ . '/../config/databaseController.php';

class Contact{

    private int $id_contact;
    private string $user;
    private string $email;
    private string $object;
    private string $content;

    public function get_id_contact() :int{
        return $this->id_contact;
    }
    public function set_id_contact(int $id_contact){
        $this->id_contact = $id_contact; 
    }

    public function get_user() :int{
        return $this->user;
    }
    public function set_user(string $user){
        $this->user = $user;
    }

    public function get_email():string{
        return $this->user;
    }
    public function set_email(string $email){
        $this->email = $email;
    }

    public function get_object() :string{
        return $this->object;
    }
    public function set_object(string $object){
        $this->object = $object;
    }

    public function get_content() :string{
        return $this->content;
    }
    public function set_content(string $content){
        $this->content = $content;
    }

    public function add() :bool {

        $pdo = Database::connect();
        $sql = "INSERT INTO `contacts` ('user', 'email', 'object', 'content')
        VALUES (:user, :email, :object, :content);";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':user', $this->get_user());
        $sth->bindValue(':email', $this->get_email());
        $sth->bindValue(':object', $this->get_object());
        $sth->bindValue(':content', $this->get_content());
        $result = $sth->execute();
        return $result;
    }

    public static function ifExistsByUser(string $user){

        $pdo = Database::connect();
        $sql = "SELECT `contacts`. `user`, `users`. `user`
        FROM `contacts`
        INNER JOIN `users`ON `users.`user` = `contacts`.`user`
        WHERE `users`. `user` = :user;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':user', $user);
        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    }

    public static function ifExistsByEmail(string $email){

        $pdo = Database::connect();
        $sql = "SELECT `contacts` . `email`, `users`. `email`
        FROM `contacts`
        INNER JOIN `users` ON `users`.`email` = `contacts`. `email`
        WHERE `users` . `email` = :email;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $result = $sth->fetchColumn();

        return $result;
    }
}