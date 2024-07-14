<?php

include_once "data/Gebruiker.php";
include_once "data/GebruikerGeenId.php";
include_once "database/DatabaseFactory.php";
//CRUB methods for Items objects
// Create, Read, Update, Delete

class UsersDb
{
    
    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    
    public static function getAll(){
        //        Execute query
        $results      = self::getConnection()->executeQuery("SELECT * FROM Users");
        //        Prepare array to return to frontend
        $resultsArray = array();
        for ($i = 0; $i < $results->num_rows; $i++) {
            //Retrieves the current selected row
            $row              = $results->fetch_array();
            //Make an item
            $item             = self::convertRowToObject($row);
            //add item to result array
            $resultsArray[$i] = $item;
        }
        
        return $resultsArray;
        
    }
    
    
    public static function getUserById($id){
        //        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Users WHERE id = $id");
        //   
        
        //Retrieves the current selected row
        $row  = $results->fetch_array();
        //Make an item
        $user = self::convertRowToObject($row);
        return $user;
    }
    
    public static function getUser($username){
        //        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Users WHERE username = '$username'");
        //        Prepare array to return to frontend
        
        
        //Retrieves the current selected row
        $row  = $results->fetch_array();
        //Make an item
        $user = self::convertRowToObject($row);
        return $user;
    }
    
    
    
    public static function userExists($username){
    
        $results = self::getConnection()->executeQuery("SELECT * FROM Users WHERE username = '$username'");
        if (!empty($results) && $results->num_rows > 0) {
            return true;
        } else
            return false;
    }
    
    
    
    
    public static function insertUser($gebruiker){
        return self::getConnection()->executeQuery("INSERT INTO Users(username, wachtwoord) VALUES ('?','?')", array(
            $gebruiker->username,
            $gebruiker->wachtwoord
        ));
    }
    
    
    
    public static function convertRowToObject($row){
        return new Gebruiker(
            $row['id'],
            $row['username'], 
            $row['wachtwoord']);
    }
    
}

?>