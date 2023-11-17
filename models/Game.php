<?php

require_once __DIR__  . '/../config/databaseController.php';

class Game
{
    private int $id_games;
    private string $game;
    private ?string $picture;
    private string $description;
    private int $id_consoles;
    private int $id_types;
    private $id_user;

    public function get_id_games(): int
    {
        return $this->id_games;
    }
    public function set_id_games(int $id_games)
    {
        $this->id_games = $id_games;
    }

    public function get_game(): string
    {
        return $this->game;
    }
    public function set_game(string $game)
    {
        $this->game = $game;
    }

    public function get_picture(): ?string
    {
        return $this->picture;
    }
    public function set_picture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function get_description(): string
    {
        return $this->description;
    }
    public function set_description(string $description)
    {
        $this->description = $description;
    }

    public function get_id_consoles(): int
    {
        return $this->id_consoles;
    }
    public function set_id_consoles(int $id_consoles)
    {
        $this->id_consoles = $id_consoles;
    }

    public function get_id_types(): int
    {
        return $this->id_types;
    }
    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public function get_id_user()
    {
        return $this->id_user;
    }
    public function set_id_users($id_user)
    {
        $this->id_user = $id_user;
    }

    public function add(): bool
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO `games` (`game`, `picture`, `description`, `id_consoles`, `id_types`, `id_user`)
        VALUES (:game, :picture, :description, :id_consoles, :id_types, :id_user) ;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':game', $this->get_game());
        $sth->bindValue(':picture', $this->get_picture());
        $sth->bindValue(':description', $this->get_description());
        $sth->bindValue(':id_consoles', $this->get_id_consoles());
        $sth->bindValue(':id_types', $this->get_id_types());
        $sth->bindValue(':id_user', $this->get_id_user());
        $result = $sth->execute();

        return $result !== false;
    }

    public static function get_all(int $page = 1, bool $all = false): array
    {
        
        $offset = ($page - 1) * NB_ELEMENTS_PER_PAGE;
        $pdo = Database::connect();
        $sql = "SELECT * FROM `games`
        INNER JOIN `categories` ON `games`.`id_types`=`categories`.`id_types`
        INNER JOIN `consoles` ON `games`.`id_consoles`=`consoles`.`id_consoles`";

        if (!$all) {
            $sql = $sql . " LIMIT :limit OFFSET :offset ;";
        }
        $sth = $pdo->prepare($sql);

        if (!$all) {
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', NB_ELEMENTS_PER_PAGE, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get_all_games(){

        $pdo = Database::connect();
        $sql = "SELECT * FROM `games`;";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }
    public static function get(int $id_games)
    {

        $pdo = Database::connect();
        $sql = "SELECT * FROM `games` 
        WHERE `id_games` = :id_games;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_games', $id_games, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public function update_game(): array
    {

        $pdo = Database::connect();

        $sql = "UPDATE `games` SET 
        `game` = :game,
        `picture` = :picture,
        `description` = :description,
        `id_consoles` = :id_consoles,
        `id_types` = :id_types
        WHERE `id_games` = :id_games;";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':game', $this->get_game());
        $sth->bindValue(':picture', $this->get_picture());
        $sth->bindValue(':description', $this->get_description());
        $sth->bindValue(':id_consoles', $this->get_id_consoles(), PDO::PARAM_INT);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':id_games', $this->get_id_games(), PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function delete(int $id_games): bool
    {

        $pdo = Database::connect();
        $sql = "DELETE FROM `games` WHERE `id_games` = ? ;";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id_games]);
        return (bool) $sth->rowCount();
    }

    public static function getGames(int $id_types) :array{

        $pdo = Database::connect();
        $sql = "SELECT `games`.`id_games`, `games`.`game`, `games`.`picture`,`games`. `id_types` 
        FROM `games`
        WHERE `id_types` = :id_types
        AND (`game` LIKE 'Mario Party%'
        OR `game` LIKE 'Mario Kart%'
        OR `game` LIKE 'Super Mario Bros%'
        OR `game` LIKE 'Super Mario Land%'
        OR `game` LIKE 'Super Mario World%'
        OR `game` LIKE 'Super Mario Maker%'
        OR `game` LIKE 'Super Luigi%');";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public static function getByClause(int $id_types, int $id_consoles, int $id_games) :array
    {
        $pdo = Database::connect();
        $sql = "SELECT `games`. `id_games`, `games`. `game`, `games`. `picture`, `games`. `id_consoles`, `games`. `id_types`, `games`. `id_games`
        FROM `games`
        WHERE `id_types` =:id_types
        AND `id_consoles`= :id_consoles;
        AND `id_games`  = :id_games;";
        $sth= $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->bindValue(':id_consoles', $id_consoles, PDO::PARAM_INT);
        $sth->bindValue(':id_games', $id_games, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;

    }
}
