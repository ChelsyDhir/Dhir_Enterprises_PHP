<!-- -- Create table order_details
create table Order_Details (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    item_id INT,    
    size varchar(20),
    price DOUBLE,
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES Orders (order_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (item_id) REFERENCES Item (item_id) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB; -->

<?php

    class OrderDetails {

        private $record_id;
        private $order_id;
        private $customer_id;
        private $item_id;
        private $size;
        private $price;
        private $quantity;

        function setRecordID($record_id) {
            $this->record_id = $record_id;
        }

        function setOrderID($order_id) {
            $this->order_id = $order_id;
        }

        function setCustomerID($customer_id) {
            $this->customer_id = $customer_id;
        }

        function setItemID($item_id) {
            $this->item_id = $item_id;
        } 

        function setSize($size) {
            $this->size = $size;
        }

        function setPrice($price) {
            $this->price = $price;
        }

        function setQuantity($quantity) {
            $this->quantity = $quantity;
        }

        function getRecordID() {
            return $this->record_id;
        }
        
        function getOrderID() {
            return $this->order_id;
        }    
            
        function getCustomerID() {
            return $this->customer_id;
        }
        
        function getItemID() {
            return $this->item_id;
        }

        function getSize() {
            return $this->size;
        }

        function getPrice() {
            return $this->price;
        } 
        
        function getQuantity() {
            return $this->quantity;
        } 
    }
?>