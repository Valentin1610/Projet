<?php 

require __DIR__ . '/../config/databaseController.php';

class Console {
    private int $id_consoles;
    private string $name;

    public function get_id_consoles() : int{
        return $this->id_consoles;
    }
    public function set_id_consoles(int $id_consoles){
        $this->id_consoles=$id_consoles;
    }

    public function get_name() :string{
        return $this->name;
    }
    public function set_name(string $name){
        $this->name = $name;
    }
}