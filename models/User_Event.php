<?php 

require_once __DIR__ . '/../config/databaseController.php';

class User_Event{
    private int $id_user;
    private int $id_events;

    public function get_id_user() : int{
        return $this-> id_user;
    }
    public function set_id_users(int $id_user){
        $this->id_user = $id_user;
    }

    public function get_id_events() :int{
        return $this-> id_events;
    }
    public function set_id_events(int $id_events){
        $this->id_events = $id_events;
    }
}