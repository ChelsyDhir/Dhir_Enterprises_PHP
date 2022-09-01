DROP DATABASE IF EXISTS Dhir_Enterprises;
CREATE DATABASE IF NOT EXISTS Dhir_Enterprises;
USE Dhir_Enterprises;

--Create table Admin
create table Admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50),
    name varchar(50),
    address varchar(50),
    password varchar(255)
) Engine=InnoDB;

--Create table Customer
create table Customer (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    phone varchar(50) Unique,
    name varchar(50),
    address varchar(50),
    gst_number varchar(20),
    password varchar(255)
) Engine=InnoDB;

insert into Customer (customer_id, phone, name, address, gst_number, password) values (1000, 2366658956, 'Chelsy', 'Punjab', '123456789652', '12345');
insert into Customer (customer_id, phone, name, address, gst_number, password) values (1001, 9417936366, 'Arora Dasuya', 'Hoshiarpur', '123456789782', '12345');

--create table item
create table Item (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name varchar(50)
) Engine=InnoDB;

insert into item (item_id, item_name) values (1, 'Computer Table');
insert into item (item_id, item_name) values (2, 'LED Stand');
insert into item (item_id, item_name) values (3, 'Shoe Rack');
insert into item (item_id, item_name) values (4, 'Sofa Cum Bed');
insert into item (item_id, item_name) values (5, 'Sofa Set');
insert into item (item_id, item_name) values (6, 'Bed');
insert into item (item_id, item_name) values (7, 'Iron Almirah');
insert into item (item_id, item_name) values (8, 'Mattress');
insert into item (item_id, item_name) values (9, 'Dressing Table');
insert into item (item_id, item_name) values (10, 'Center Table');
insert into item (item_id, item_name) values (11, 'Office Table');
insert into item (item_id, item_name) values (12, 'Press Table');
insert into item (item_id, item_name) values (13, 'Office Table');
insert into item (item_id, item_name) values (14, 'Office Table');
insert into item (item_id, item_name) values (15, 'Books Almirah');

--Create table Orders
create table Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    date date
) Engine=InnoDB;

-- Create table order_details
create table OrderDetails (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    customer_id INT,
    item_id INT,
    size varchar(20),
    price DOUBLE,
    quantity INT,
    FOREIGN KEY (customer_id) REFERENCES Customer (customer_id),
    FOREIGN KEY (order_id) REFERENCES Orders (order_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (item_id) REFERENCES Item (item_id) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

