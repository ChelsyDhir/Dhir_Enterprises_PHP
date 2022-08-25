<?php

class CustomerDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService("Customer");
    }

    //creating new Customer
    static function createCustomer(Customer $newCustomer)  {
       
        //This is Statement:
        $sql = "INSERT INTO Customer (phone, name, address, gst_number, password)
                VALUES (:phone, :name, :address, :gst_number, :password)";

        // QUERY 
        self::$db->query($sql);
        
        // BIND 
        self::$db->bind(':phone', $newCustomer->getPhone());
        self::$db->bind(':name', $newCustomer->getName());
        self::$db->bind(':address', $newCustomer->getAddress());
        self::$db->bind(':gst_number', $newCustomer->getGstNumber());
        self::$db->bind(':password', $newCustomer->getPassword());

        //EXECUTE
        self::$db->execute();

        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }
    
    static function getCustomer($CustomerID){
        $sql = "SELECT name FROM Customer WHERE customer_id=:customer_id";
        self::$db->query($sql);
        self::$db->bind(':customer_id', $CustomerID);
        self::$db->execute();
        return self::$db->singleResult();

    }
    
    static function getCustomers() : Array {

        $sql = "SELECT * from Customer";
        //Prepare the Query
        self::$db->query($sql);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }
    
    // UPDATE means update
    static function updateCustomer (Customer $CustomerToUpdate): int {

        // QUERY
        $sql = "UPDATE customer SET name=:name, 
                     phone=:phone,
                     address=:address,
                     gst_number=:gst_number,
                     password=:password
                     WHERE customer_id=:customer_id";
                
        //QUERY
        self::$db->query($sql);
        //BIND
        self::$db->bind(':customer_id', $CustomerToUpdate->getCustomerID());
        self::$db->bind(':name', $CustomerToUpdate->getName());
        self::$db->bind(':phone', $CustomerToUpdate->getPhone());
        self::$db->bind(':address', $CustomerToUpdate->getAddress());
        self::$db->bind(':gst_number', $CustomerToUpdate->getGstNumber());
        self::$db->bind(':password', $CustomerToUpdate->getPassword());

        self::$db->execute();

        // You may want to return the rowCount
        return self::$db->rowCount();

    }
    
    // Sorry, I need to DELETE your record
    static function deleteCustomer(string $CustomerId) {
        $sql = "DELETE FROM customer WHERE customer_id=:customer_id";

        try{
            self::$db->query($sql);
            self::$db->bind(':customer_id', $CustomerId);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                throw new Exception("Problem deleting record $CustomerId");
            }

        }catch(Exception $exc){
            echo $exc->getMessage();
        }   
    } 
}


?>