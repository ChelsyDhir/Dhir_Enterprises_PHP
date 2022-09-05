<?php

class OrdersDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService("Orders");
    }

    static function createOrder()  {
        //This is Statement:
        $sql = "INSERT INTO Orders (date)
                VALUES (:date)";

        // QUERY 
        self::$db->query($sql);
        
        // BIND 
        self::$db->bind(':date', Date("Y-m-d",time()));
    
        //EXECUTE
        self::$db->execute();

        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }

    static function getOrdersList($customer_ID) {

        $sql ="SELECT orderdetails.OrderID, orders.CustomerID, Date,SUM(Price) as total_price, count(orderdetails.OrderID) as 'number_items'
            FROM orderdetails join orders on
            orderdetails.OrderID = orders.OrderID 
            where orders.CustomerID =:customer_id 
            group by orders.OrderID";

        self::$db->query($sql);

        self::$db->bind(':customer_id', $customer_ID);
        
        self::$db->execute();

        return self::$db->resultSet();
            
    }
    
    static function getOrderOnSearch($order_id, $customer_id) {
        $sql ="SELECT orderdetails.OrderID, orders.CustomerID, Date,SUM(Price) as total_price, count(orderdetails.OrderID) as 'number_items'
        FROM orderdetails join orders on
        orderdetails.OrderID = orders.OrderID 
        where orders.CustomerID =:customer_id and orders.OrderID =:order_id 
        group by orders.OrderID;";

        self::$db->query($sql);

        self::$db->bind(':customer_id', $customer_id);
        self::$db->bind(':order_id', $order_id);
        
        self::$db->execute();

        return self::$db->resultSet();

    }

    // static function getAdminOrderOnSearch($customer_id) {
    //     $sql ="SELECT orderdetails.OrderID, orders.CustomerID,
    //             customer.Name, Date,SUM(Price) as total_price, 
    //             count(orderdetails.OrderID) as 'number_items' 
    //             FROM orderdetails join orders on 
    //             orderdetails.OrderID = orders.OrderID Join Customer on 
    //             customer.CustomerID = orders.CustomerID 
    //             where orders.CustomerID =:customer_id
    //             group by orders.OrderID 
    //             having SUM(Price)>0;";

    //     self::$db->query($sql);

    //     self::$db->bind(':customer_id', $customer_id);
        
    //     self::$db->execute();

    //     return self::$db->resultSet();

    // }

    // static function getOrder(string $OrderID)  {

    //     //This is statement
    //     $sql = "SELECT * from Orders WHERE OrderID = :orderID";
         
    //     //QUERY
    //     self::$db->query($sql);

    //     //BIND
    //     self::$db->bind(':orderID', $OrderID);

    //     //EXECUTE
    //     self::$db->execute();

    //     //RETURN (the single result)
    //     return self::$db->singleResult();

    // }

    static function getOrdersDetails() : Array {

        $sql = "SELECT orderdetails.order_id, 
                orderdetails.customer_id,     customer.name, 
                item.item_name, orderdetails.size, orderdetails.price, 
                orderdetails.quantity   FROM orderdetails 
                JOIN orders on orderdetails.order_id = orders.order_id
                JOIN Customer on customer.customer_id = orderdetails.customer_id
                JOIN item on item.item_id = orderdetails.item_id;";
                
        //Prepare the Query
        self::$db->query($sql);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }
    
    // UPDATE
    static function updateOrder (Orders $OrderToUpdate): int {

        // QUERY
        $sql = "UPDATE orders SET 
                     Date=:date
                     WHERE  OrderID=:orderId";
                
        //QUERY
        self::$db->query($sql);
        //BIND
        self::$db->bind(':date', $OrderToUpdate->getDate());

        self::$db->execute();

        // You may want to return the rowCount
        return self::$db->rowCount();

    }
    
    static function deleteOrder(string $order_id) {
        $sql = "DELETE FROM Orders WHERE order_id=:order_id";

        try{
            self::$db->query($sql);
            self::$db->bind(':order_id', $order_id);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                throw new Exception("<br>Problem deleting record $order_id");
            }

        }catch(Exception $exc){
            echo $exc->getMessage();
        }
    }    
}
?>