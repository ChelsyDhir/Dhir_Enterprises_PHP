<!-- 
--Create table Orders
create table Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    date date,
    FOREIGN KEY (customer_id) REFERENCES Customer (customer_id)
) Engine=InnoDB; -->

<?php

class Orders {
    private $order_id;
    private $customer_id;
    private $date;

    function setOrderID($order_id) {
        $this->order_id = $order_id;
    }

    function setCustomerID($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getOrderID() {
        return $this->order_id;
    }

    function getCustomerID() {
        return $this->customer_id;
    }

    function getDate() {
        return $this->date;
    }
    


}
?>