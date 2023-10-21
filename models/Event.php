<?php

require_once __DIR__ . '/../config/databaseController.php';

class Event {
    private int $id_events;
    private string $name;
    private DateTime $inaugurate;
    private string $friend_code;

    public function get_id_events() :int{
        return $this->id_events;
    }
    public function set_id_events(int $id_events){
        $this->id_events = $id_events;
    }

    public function get_name() :string{
        return $this->name;
    }
    public function set_name(string $name){
        $this->name = $name;
    }

    public function get_inaugurate() :DateTime{
        return $this->inaugurate;
    }
    public function set_inaugurate(DateTime $inaugurate){
        $this->inaugurate = $inaugurate;
    }

    public function get_friend_code() :string{
        return $this->friend_code;
    }
    public function set_friend_code(string $friend_code){
        $this->friend_code = $friend_code;
    }
}
