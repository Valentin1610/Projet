<?php 

require_once __DIR__ . '/../config/databaseController.php';

class Tip {
    private int $id_tips;
    private string $tip;
    private string $description_tip;
    private bool $validate;
    private $id_user;
    private $id_games;

    public function get_id_tips() :int{
        return $this->id_tips;
    }
    public function set_id_tips(int $id_tips){
        $this->id_tips = $id_tips;
    }

    public function get_tip() :string{
        return $this->tip;
    }
    public function set_tip(string $tip){
        $this->tip = $tip;
    }

    public function get_description_tip() :string{
        return $this->description_tip;
    }
    public function set_description_tip(string $description_tip){
        $this->description_tip = $description_tip;
    }

    public function get_validate() :bool{
        return $this->validate;
    }
    public function set_validate(bool $validate){
        $this->validate = $validate;
    }
    
    public function get_id_user() {
        return $this->id_user;
    }
    public function set_id_users($id_user){
        $this->id_user = $id_user;
    }

    public function get_id_games() :int{
        return $this->id_games;
    }
    public function set_id_games(int $id_games){
        $this->id_games = $id_games;
    }

    public function add() :bool {

        $pdo = Database::connect();
        $sql = "INSERT INTO `tips` (`tip`, `description_tip`, `id_user`, `id_games`)
        VALUES (:tip, :description_tip, :id_user, :id_games);";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':tip', $this->get_tip());
        $sth->bindValue(':description_tip', $this->get_description_tip());
        $sth->bindValue(':id_user', $this->get_id_user(), PDO::PARAM_INT);
        $sth->bindValue(':id_games', $this->get_id_games(), PDO::PARAM_INT);
        $result = $sth->execute();

        return $result !== false;
    }

    public static function get($id_tips) {

        $pdo = Database::connect();
        $sql = "SELECT * FROM `tips`
        WHERE `id_tips` = :id_tips;";
        $sth=$pdo->prepare($sql);
        $sth->bindValue(':id_tips', $id_tips, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;

    }

    public static function getAll(int $page = 1, bool $all = false): array{

        $offset = ($page - 1 ) * NB_ELEMENTS_PER_PAGE;
        $pdo = Database::connect();
        $sql = "SELECT * FROM `tips`
        INNER JOIN `games`
        ON `tips`.`id_games` = `games`.`id_games`;";

        if(!$all){
            $sql = $sql . " LIMIT :limit OFFSET :offset;";
        }
        $sth = $pdo->prepare($sql);

        if(!$all){
            $sth->bindValue(':limit', $offset, PDO::PARAM_INT);
            $sth->bindValue(':offset', NB_ELEMENTS_PER_PAGE, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function update() {
        $pdo = Database::connect();
        $sql = "UPDATE `tips` SET `tip` = :tip, `description_tip` = :description_tip, `id_games` = :id_games
        WHERE `id_tips` = :id_tips ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':tip', $this->get_tip());
        $sth->bindValue(':description_tip', $this->get_description_tip());
        $sth->bindValue(':id_tips', $this->get_id_tips(), PDO::PARAM_INT);
        $sth->bindValue(':id_games', $this->get_id_games(), PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function  get_all_tips($id_games){

        $pdo = Database::connect();
        $sql = "SELECT * FROM `tips` WHERE `id_games`= :id_games;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_games', $id_games, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function delete(int $id_tips) :bool
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM `tips` WHERE `id_tips` = :id_tips;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_tips', $id_tips, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}