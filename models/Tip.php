<?php 

require_once __DIR__ . '/../config/databaseController.php';

class Tip {
    private int $id_tips;
    private string $title;
    private string $description;
    private bool $validate;
    private int $id_user;
    private $id_games;

    public function get_id_tips() :int{
        return $this->id_tips;
    }
    public function set_id_tips(int $id_tips){
        $this->id_tips = $id_tips;
    }

    public function get_title() :string{
        return $this->title;
    }
    public function set_title(string $title){
        $this->title = $title;
    }

    public function get_description() :string{
        return $this->description;
    }
    public function set_description(string $description){
        $this->description = $description;
    }

    public function get_validate() :bool{
        return $this->validate;
    }
    public function set_validate(bool $validate){
        $this->validate = $validate;
    }
    
    public function get_id_user() :int{
        return $this->id_user;
    }
    public function set_id_user(int $id_user){
        $this->id_user = $id_user;
    }

    public function get_id_games() :int{
        return $this->id_games;
    }
    public function set_id_games(int $id_games){
        $this->id_games = $id_games;
    }
}