<?php

class ItemDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService("Item");
    }

    //creating new Customer
    static function createItem(Item $newItem)  {
       
        //This is Statement:
        $sql = "INSERT INTO Item (item_name) VALUES (:item_name)";
        // QUERY 
        self::$db->query($sql);
        // BIND 
        self::$db->bind(':item_name', $newItem->getItemName());
        //EXECUTE
        self::$db->execute();
        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }
    
    static function getItems() : Array {

        $sql = "SELECT * from Item";
        //Prepare the Query
        self::$db->query($sql);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }
    
    // UPDATE means update
    static function updateItem (Item $ItemToUpdate): int {

        // QUERY
        $sql = "UPDATE item SET item_name=:item_name
                     WHERE item_id=:item_id";
                
        //QUERY
        self::$db->query($sql);
        //BIND
        self::$db->bind(':item_name', $ItemToUpdate->getItemName());
        self::$db->bind(':item_id', $ItemToUpdate->getItemName());
        
        self::$db->execute();

        // You may want to return the rowCount
        return self::$db->rowCount();

    }
    
}


?>