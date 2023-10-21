<?php 

require_once __DIR__ . '/../config/databaseController.php';

class User_Tip{
    private int $id_user;
    private int $id_tips;

    public function get_id_user() : int{
        return $this-> id_user;
    }
    public function set_id_users(int $id_user){
        $this->id_user = $id_user;
    }

    public function get_id_tips() :int{
        return $this-> id_tips;
    }
    public function set_id_tips(int $id_tips){
        $this->id_tips = $id_tips;
    }
}