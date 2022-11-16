<?php
require_once "db/PdoConnectionClass.php";
require_once "db/MysqliConnectionClass.php";
require_once "CustomerControllerClass.php";
require_once "db/DbConnectionInterface.php";

$data = new PdoConnectionClass;
// echo $data->update("products",[2,"rada9211",311,2]);
// echo $data->update("productscustomer",["test000@gmail.com",5]);

echo "===========";
// echo $data->insert("customer",["test110@gmail.com"]);
echo "===========";
// echo $data->delete("customer",2);
echo "===========";

$conn = new MysqliConnectionClass();
// $conn = new PdoConnectionClass();

$customer = new CustomerControllerClass($conn, "customer");

// var_dump($customer->getCustomers());
// echo $customer->insertCustomer(["testtest139@gmail.com"]);
echo "===========";
$customer->updateCustomer(["test00011112@gmail.com",10]);
// $customer->deleteCustomer(69);
