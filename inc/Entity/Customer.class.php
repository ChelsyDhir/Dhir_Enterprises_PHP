<!-- --Create table Customer
create table Customer (
    customer_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50),
    name varchar(50),
    address varchar(50),
    password varchar(255)
) Engine=InnoDB; -->

<?php

class Customer {
    private $customer_id;
    private $phone;
    private $name;
    private $address;
    private $gst_number;
    private $password;

    //setters to the set/create/register the admin
    function setCustomerID($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setPhone($phone){
        $this->phone = $phone;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setGstNumber($gst_number) {
        $this->gst_number = $gst_number;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    //getters to get the value
    function getCustomerID() {
        return $this->customer_id;
    }
    
    function getPhone() {
        return $this->phone;
    }
    
    function getName() {
        return $this->name;
    }
    
    function getAddress() {
        return $this->address;
    }

    function getGstNumber() {
        return $this->gst_number;
    }

    function getPassword() {
        return $this->password;
    }
    
    //Verify the password
    function verifyPassword(string $passwordToVerify) {
        return password_verify($passwordToVerify, $this->password);
    }




}
?>