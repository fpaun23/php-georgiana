*Requirements:*

Starting from previous ticket, create a a PDO connection to the database. 
Do this using a new class - PdoConnectionClass.php that will live under a new folder called *db* in the root of the project db/PdoConnectionClass.php 

 ---see atachement ---


The PdoConnectionClass will have the following functions:

 - connect() ->to connect to the database

 - get(string $tableName): array - > select all data from $tablename

 - update(string $tableName, array $updateData): bool -> update table $tablename with the data provided in the $updatData array

 - Insert(string $tableName, array $insertData): int -> insert a new record in table $tablename with values provided in $insertData array
funtion return type int -> return the Primery Key of the inserted record

 - delete($tablename, int $recordId): bool -> delete redord with Primary Key $recordId from table $tableName

Create a new class CustomerControllerClass.php (just like ProductsControllerClass.php). 

This class will connect to the database via the PdoConnectionClass.

Create 4 functions:

- getCustomers(): array -> will get all customers from database

- insertCustomer(array $insertData): int -> insert new record in customer database

- updateCustomer(array $updateData): bool ->  update a customer 

- deleteCustomer(int $customerId): bool -> delete customer wit Primary Key $customerId

These functions will call the associated functions from PdoConnectionClass.
Ex: function getCustomers() {... $pdoObj->get('customers') .. }
These function will not have sql code written inside, all the queries will be PdoConnectionClass.

From index.php call the CustomerControllerClass functions.

Resource: https://www.cloudways.com/blog/crud-with-php-data-objects/
