<?php
require_once("db/PdoConnectionClass.php");
require_once("CustomerControllerClass.php");

$data = new PdoConnectionClass;
// echo $data->update("products",[2,"rada9211",311,2]);
// echo $data->update("productscustomer",["test000@gmail.com",5]);

echo "===========";
// echo $data->insert("customer",["test110@gmail.com"]);
echo "===========";
// echo $data->delete("customer",2);
echo "===========";

$customer = new CustomerControllerClass("customer");
// var_dump($customer->getCustomers());
// $customer->insertCustomer(["test1106@gmail.com"]);
echo "===========";
// $customer->updateCustomer(["test000@gmail.com",5]);
$customer->deleteCustomer(5);
