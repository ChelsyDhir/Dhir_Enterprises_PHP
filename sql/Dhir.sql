DROP DATABASE IF EXISTS Dhir_Enterprises;
CREATE DATABASE IF NOT EXISTS Dhir_Enterprises;
USE Dhir_Enterprises;

--Create table Admin
create table Admin (
    admin_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50),
    name varchar(50),
    address varchar(50),
    password varchar(255)
) Engine=InnoDB;

--Create table Customer
create table Customer (
    customer_id INT(3) AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50),
    name varchar(50),
    address varchar(50),
    password varchar(255)
) Engine=InnoDB;

--Create table Order
create table Order (
    order_id TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(3),
    date varchar(50),
    FOREIGN KEY (customer_id) REFERENCES Customer (customer_id)
) Engine=InnoDB;