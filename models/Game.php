<?php 

require_once __DIR__  . '/../config/databaseController.php';

class Game {
    private int $id_games;
    private string $name;
    private string $picture;
    private string $description;
    private int $id_consoles;
    private int $id_categories;
    private int $id_user;

    public function get_id_games() : int {
        return $this->id_games;
    }
    public function set_id_games(int $id_games){
        $this->id_games= $id_games;
    }

    public function get_name() : string {
        return $this->name;
    }
    public function set_name(string $name){
        $this->name= $name;
    }

    public function get_picture() : string{
        return $this ->picture; 
    }
    public function set_picture(string $picture){
        $this->picture = $picture;
    }

    public function get_description() : string{
        return $this->description;
    }
    public function set_description(string $description) {
        $this->description = $description;
    }

    public function get_id_consoles() :int{
        return $this-> id_consoles;
    }
    public function set_id_consoles(int $id_consoles) {
        $this->id_consoles= $id_consoles;
    }

    public function get_id_categories() :int{
        return $this->id_categories;
    }
    public function set_id_categories(int $id_categories){
        $this->id_categories = $id_categories;
    }

    public function get_id_user() :int{
        return $this-> id_user;
    }
    public function set_id_user(int $id_user){
        $this->id_user = $id_user;
    }
}