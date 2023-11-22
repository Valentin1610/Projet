<?php

require_once __DIR__ . '/../config/databaseController.php';

class Event {
    private int $id_events;
    private string $event;
    private string $inaugurate;

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

    public function get_inaugurate() :string{
        return $this->inaugurate;
    }
    public function set_inaugurate(string $inaugurate){
        $this->inaugurate = $inaugurate;
    }

    public function add() :bool{

        $pdo = Database::connect();
        $sql = "INSERT INTO `events` (`event`, `inaugurate`)
        VALUES (:event, :inaugurate);";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':event', $this->get_event());
        $sth->bindValue(':inaugurate', $this->get_inaugurate());

        $result = $sth->execute();
        return $result;
    }

    public static function get(int $id_events){
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
        $sql = "UPDATE `events` SET `event` = :event, `inaugurate` = :inaugurate
        WHERE `id_events` = :id_events;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':event', $this->get_event());
        $sth->bindValue(':inaugurate', $this->get_inaugurate());
        $sth->bindValue(':id_events', $this->get_id_events(), PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function delete(int $id_events) :bool {

        $pdo = Database::connect();
        $sql = "DELETE FROM `events` WHERE `id_events` = :id_events;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_events', $id_events, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}
