<?php

include_once "data/Item.php";
include_once "data/ItemGeenId.php";
include_once "database/DatabaseFactory.php";
//CRUB methods for Items objects
// Create, Read, Update, Delete

class ItemsDb {
    
    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    
    public static function getAll(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Items");
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
    
      public static function getVierWillekeurigUitgelichte(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Items WHERE uitgelicht = '1' ORDER BY RAND() LIMIT 4");
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
    
          public static function getVierNieuwste(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Items ORDER BY id DESC LIMIT 4");
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
    
        public static function getItemById($id){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Items WHERE id = '$id'");
//        Prepare array to return to frontend
           //Retrieves the current selected row
        $row  = $results->fetch_array();
        //Make an item
        $item = self::convertRowToObject($row);
        return $item;
    }
    
          public static function getVierZelfdeCategorie($id){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM `Items` WHERE categorie = (SELECT categorie FROM `Items` WHERE id = $id) AND id <> $id ORDER BY RAND() LIMIT 4;");
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
    
            public static function getItemsByCategorie($categorie){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Items WHERE categorie = $categorie");
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
        return self::getConnection()->executeQuery("INSERT INTO Items(name, price, beschrijving, img, uitgelicht, categorie) VALUES ('?','?','?','?','?','?')", array($item->name, $item->price, $item->beschrijving, $item->img, $item->uitgelicht, $item->categorie));  
    }
    
    //ublic static function insert($boost){
   //     echo "insert start";
    //    return self::getConnection()->executeQuery("INSERT INTO Book(Title, ReleaseDate, Price, EmailPublisher) VALUES ('?','?','?','?')", array($book->title, $book->releasedate,$book->priceExclVAT,$book->emailPublisher));  
   // }
    
    
        
    public static function convertRowToObject($row){
        return new Item(
            $row['id'], 
            $row['name'], 
            $row['price'], 
            $row['beschrijving'], 
            $row['img'],
            $row['uitgelicht'], 
            $row['categorie']);
    }
    
}

?>