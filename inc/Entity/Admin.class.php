<!-- create table Admin (
    admin_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50),
    name varchar(50),
    address varchar(50),
    password varchar(255)
) Engine=InnoDB; -->


<?php

Class Admin {

    private $admin_id;
    private $phone;
    private $name;
    private $address;
    private $password;

    //setters to the set/create/register the admin
    function setAdminID($admin_id) {
        $this->admin_id = $admin_id;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    //getters to get the information of admin
    function getAdminID() {
        return $this->admin_id;
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

    function getPassword() {
        return $this->password;
    }
    
    //Verify the password
    function verifyPassword(string $passwordToVerify) {
        return password_verify($passwordToVerify, $this->password);
    }



}
?>