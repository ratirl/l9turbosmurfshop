<?php

include_once "data/BestellingGeenId.php";
include_once "data/Bestelling.php";
include_once "database/DatabaseFactory.php";

class BestellingDB {
    
    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    
    public static function getAll(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Bestelling");
//        Prepare array to return to frontend
        $resultsArray = array();
        for($i = 0; $i < $results->num_rows; $i++ ){
            //Retrieves the current selected row
            $row = $results->fetch_array(); 
            //Make an item
            $item = self::convertRowToObject($row);
            //add item to result array
            $resultsArray[$i] = $item;  
        }

        return $resultsArray;
        
    }
    
            public static function getBestellingById($id){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Bestelling WHERE id = '$id'");
//        Prepare array to return to frontend
           //Retrieves the current selected row
        $row  = $results->fetch_array();
        //Make an item
        $item = self::convertRowToObject($row);
        return $item;
    }

    
     public static function getLastId(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Bestelling ORDER BY id DESC LIMIT 1");
//        Prepare array to return to frontend
           //Retrieves the current selected row
        $row  = $results->fetch_array();
        //Make an item
        $item = self::convertRowToObject($row);
        return $item;
    }
    

    public static function insert($item){
        return self::getConnection()->executeQuery("INSERT INTO Bestelling(user, factuuradres, leveradres, levermethode, betaalmethode) VALUES ('?','?','?','?','?')", array($_SESSION["user"], $item->factuuradres, $item->leveradres, $item->levermethode, $item->betaalmethode));  
    }
    
    //ublic static function insert($boost){
   //     echo "insert start";
    //    return self::getConnection()->executeQuery("INSERT INTO Book(Title, ReleaseDate, Price, EmailPublisher) VALUES ('?','?','?','?')", array($book->title, $book->releasedate,$book->priceExclVAT,$book->emailPublisher));  
   // }
    
        
    public static function convertRowToObject($row){
        return new Bestelling(
            $row['id'], 
            $row['user'],
            $row['factuuradres'], 
            $row['leveradres'], 
            $row['levermethode'], 
            $row['betaalmethode']);
    }
    
}

?>