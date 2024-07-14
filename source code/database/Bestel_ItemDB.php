<?php

include_once "data/Bestel_Item.php";
include_once "data/Bestel_ItemGeenId.php";
include_once "database/DatabaseFactory.php";

class Bestel_ItemDB {
    
    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }


        public static function getCategories(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT DISTINCT categorie FROM Items");
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


    
            public static function getBestelItemsByBestelId($id){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Bestel_item WHERE bestelling_id = $id");
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
    
    public static function insert($item){
        return self::getConnection()->executeQuery("INSERT INTO Bestel_item(bestelling_id, item_id, aantal, totaalprijs) VALUES ('?','?','?','?')", array($item->bestelling_id, $item->item_id,
        $item->aantal, $item->totaalprijs));  
    }

        
    public static function convertRowToObject($row){
        return new Bestel_Item(
            $row['id'], 
            $row['bestelling_id'], 
            $row['item_id'], 
            $row['aantal'], 
            $row['totaalprijs']);
    }
    
}

?>