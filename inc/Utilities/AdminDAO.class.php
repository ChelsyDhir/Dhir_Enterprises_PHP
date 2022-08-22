<?php

class AdminDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize()    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService("Admin");
    }

    //creating new Admin
    static function createAdmin(Admin $newAdmin)  {
       
        //This is Statement:
        $sql = "INSERT INTO Admin (phone, name, address, password)
                VALUES (:phone, :name, :address, :password)";

        // QUERY 
        self::$db->query($sql);
        
        // BIND 
        self::$db->bind(':phone', $newAdmin->getPhone());
        self::$db->bind(':name', $newAdmin->getName());
        self::$db->bind(':address', $newAdmin->getAddress());
        self::$db->bind(':password', $newAdmin->getPassword());

        //EXECUTE
        self::$db->execute();

        // You may want to return the last inserted id
        return self::$db->lastInsertedId();
    }
    
    static function getAdmins() : Array {

        $sql = "SELECT * from admin";
        //Prepare the Query
        self::$db->query($sql);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }
    
   
}


?>