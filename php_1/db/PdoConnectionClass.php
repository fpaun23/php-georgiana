<?php
require_once __DIR__ . '/../config/Config.php';

class PdoConnectionClass
{
    private $serverName = Config::HOST;
    private $database = Config::DATABASE;
    private $user = Config::USER;
    private $pass = Config::PASSWORD;
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;
    protected $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }

    private function connect()
    {
        try {
            $this->con = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    public function get(string $tableName): array
    {
        $data = [];
        $sql = "SELECT * FROM $tableName";
        foreach ($this->db->query($sql) as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function update(string $tableName, array $updateData): bool
    {
        switch ($tableName) {
            case "products":
                $sql = "UPDATE $tableName SET `id_cat`= $updateData[0] , `name_prod`= '$updateData[1]', `price` = $updateData[2] WHERE `id_prod` = $updateData[3]";
                break;
            case "customer":
                $sql = "UPDATE $tableName SET `email`= '$updateData[0]' WHERE `id` = $updateData[1]";
                break;
            case "orders":
                $sql = "UPDATE $tableName SET `delivery_type`= $updateData[0] , `customer_id`= '$updateData[1]', `poducts_id` = $updateData[2] WHERE `id` = $updateData[3]";
                break;
            case "category":
                $sql = "UPDATE $tableName SET `name_cat`= $updateData[0] WHERE `id_cat` = $updateData[1]";
                break;
            case "dimensions":
                $sql = "UPDATE $tableName SET `value`= $updateData[0] WHERE `id_dimensions` = $updateData[1]";
                break;
            case "colors":
                $sql = "UPDATE $tableName SET `color`= $updateData[0] WHERE `id_color` = $updateData[1]";
                break;
        }
        $affectedrows = $this->db->exec($sql);
        if (isset($affectedrows)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert(string $tableName, array $insertData): int
    {
        switch ($tableName) {
            case "products":
                $sql = "INSERT INTO $tableName (id_cat,name_prod,price) VALUES ( :$insertData[0], :$insertData[1], :$insertData[2])";
                break;
            case "customer":
                $sql = "INSERT INTO $tableName (`email`) VALUES ('$insertData[0]')";
                break;
        }
        $this->db->exec($sql);

        return $this->db->lastInsertId();
    }

    public function delete($tableName, int $recordId): bool
    {
        switch ($tableName) {
            case "products":
                $sql = "DELETE FROM $tableName WHERE `id_prod` = $recordId";
                break;
            case "customer":
                $sql = "DELETE FROM $tableName WHERE `id` = $recordId";
                break;
        }
        $affectedrows = $this->db->exec($sql);
        if (isset($affectedrows)) {
            return true;
        } else {
            return false;
        }

    }
}
