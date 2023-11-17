<?php

require_once __DIR__ . '/../config/databaseController.php';

class Event {
    private int $id_events;
    private string $event;
    private DateTime $inaugurate;
    private string $friend_code;

    public function get_id_events() :int{
        return $this->id_events;
    }
    public function set_id_events(int $id_events){
        $this->id_events = $id_events;
    }

    public function get_event() :string{
        return $this->event;
    }
    public function set_event(string $event){
        $this->event = $event;
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

    public function add() :bool{

        $pdo = Database::connect();
        $sql = "INSERT INTO `events` (`event`, `inaugurate`, `friend_code`)
        VALUES (:event, :inaugurate, :friend_code);";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':event', $this->get_event());
        $sth->bindValue(':inaugurate', $this->get_inaugurate());
        $sth->bindValue('friend_code', $this->get_friend_code());

        $result = $sth->execute();
        return $result;
    }

    public static function get(int $id_events) :object{
        $pdo =Database::connect();
        $sql = "SELECT * FROM `events`
        WHERE `id_events` = :id_events;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_events', $id_events, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public static function get_all() :array {

        $pdo =Database::connect();
        $sql = "SELECT * FROM `events`;";
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function update() :bool{

        $pdo = Database::connect();
        $sql = "UPDATE `events` SET `event`, `inaugurate`, `friend_code` VALUES (:event; :inaugurate, :friend_code)
        WHERE `id_events` = :id_events;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':event', $this->get_event());
        $sth->bindValue(':inaugurate', $this->get_inaugurate());
        $sth->bindValue(':friend_code',$this->get_friend_code());
        $sth->bindValue(':id_events', $this->get_id_events(), PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll();
        return $result;
    }

    public static function delete(int $id_events) :bool {

        $pdo = Database::connect();
        $sql = "DELETE FROM `events` WHERE `id_events` = ?;";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id_events]);
        return (bool) $sth->rowCount();
    }
}
