<?php 

require_once  __DIR__ . '/../config/databaseController.php';

class User {
    private int $id_user;
    private string $username;
    private string $email;
    private string $password;
    private ?string $picture;
    private int $role;

    public function get_id_user() :int{
        return $this->id_user;
    }
    public function set_id_users(int $id_user){
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
        $this->password = $password;
    }

    public function get_picture() :string{
        return $this->picture;
    }
    public function set_picture(string $picture){
        $this->picture = $picture;
    }

    public function get_role() :int{
        return $this->role;
    }
    public function set_role(int $role){
        $this->role = $role;
    }
}