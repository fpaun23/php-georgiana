<?php

require_once 'db/PdoConnectionClass.php';

class CustomerControllerClass
{
    protected $tableName;
    protected $conn;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
        $this->conn = new PdoConnectionClass();
    }

    public function getCustomers(): array
    {
        $customerTable = $this->tableName;
        return $this->conn->get($customerTable);
    }

    public function insertCustomer(array $insertData): int
    {
        return $this->conn->insert($this->tableName, $insertData);
    }

    public function updateCustomer(array $updateData): bool
    {
        return $this->conn->update($this->tableName, $updateData);

    }

    public function deleteCustomer(int $customerId): bool
    {
        return $this->conn->delete($this->tableName, $customerId);

    }
}
