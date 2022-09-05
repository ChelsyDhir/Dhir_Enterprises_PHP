<?php

class OrderDetailsDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService("OrderDetails");
    }

    //creating new Customer
    static function createOrderDetails(OrderDetails $newOrderDetails)  {
       
        //This is Statement:
        $sql = "INSERT INTO OrderDetails (order_id, item_id, customer_id, size, price, quantity)
                VALUES (:order_id, :item_id, :customer_id, :size, :price, :quantity)";

        // QUERY 
        self::$db->query($sql);
        
        // BIND 
        self::$db->bind(':order_id', $newOrderDetails->getOrderID());
        self::$db->bind(':item_id', $newOrderDetails->getItemID());
        self::$db->bind(':size', $newOrderDetails->getSize());
        self::$db->bind(':customer_id', $newOrderDetails->getCustomerID());
        self::$db->bind(':price', $newOrderDetails->getPrice());
        self::$db->bind(':quantity', $newOrderDetails->getQuantity());

        //EXECUTE
        self::$db->execute();

        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }  
 
}


?>