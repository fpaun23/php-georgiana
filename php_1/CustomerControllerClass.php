<?php

require_once('db/PdoConnectionClass.php');

class CustomerControllerClass
{
    protected string $tableName;

    public function __construct(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function getCustomers(): array
    {
        $conn = new PdoConnectionClass();  
        $customerTable = $this->tableName;    
        return $conn->get($customerTable);
    }

    public function insertCustomer(array $insertData): int
    {
        $conn = new PdoConnectionClass();  
        return $conn->insert($this->tableName,$insertData);
    }

    public function updateCustomer(array $updateData): bool
    {
        $conn = new PdoConnectionClass();  
        return $conn->update($this->tableName,$updateData);

    }

    public function deleteCustomer(int $customerId): bool
    {
        $conn = new PdoConnectionClass();  
        return $conn->delete($this->tableName,$customerId);

    }
}
