<?php
require_once __DIR__ . '/../config/Config.php';
require_once 'DbConnectionInterface.php';

class MysqliConnectionClass implements DbConnectionInterface
{
    protected $con;
    protected $db;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        return new mysqli(Config::HOST, Config::USER, Config::PASSWORD, Config::DATABASE);
    }

    public function get(string $tableName): array
    {
        $data = [];
        $sql = "SELECT * FROM $tableName";
        foreach ($this->connect()->query($sql) as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function update(string $tableName, array $updateData): bool
    {
        $sql = "UPDATE $tableName SET `email`= '$updateData[0]' WHERE `id` = $updateData[1]";

        $affectedrows = $this->connect()->query($sql);
        if (isset($affectedrows)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert(string $tableName, array $insertData): int
    {
        $sql = "INSERT INTO $tableName (`email`) VALUES ('$insertData[0]')";
        $conn = $this->connect()->query($sql);
        if ($conn === true) {
            return mysqli_insert_id($this->connect());
        } else {
            return 0;
        }
    }

    public function delete($tableName, int $recordId): bool
    {
        $sql = "DELETE FROM $tableName WHERE `id` = $recordId";
        $affectedrows = $this->connect()->query($sql);
        if (isset($affectedrows)) {
            return true;
        } else {
            return false;
        }

    }
}
