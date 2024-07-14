<?php

include_once "data/Feedback.php";
include_once "data/FeedbackGeenId.php";
include_once "database/DatabaseFactory.php";

class FeedbackDb {
    
    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    
        public static function getAllByProductId($id){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM Feedback WHERE item_id = $id");
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

    
    public static function insertFeedback($feedbackzonderid){
        return self::getConnection()->executeQuery("INSERT INTO Feedback(user_id, item_id, sterren, commentaar)
        VALUES ('?','?','?','?')", array($feedbackzonderid->user_id, $feedbackzonderid->item_id, $feedbackzonderid->sterren, $feedbackzonderid->commentaar));  
    }

        
    public static function convertRowToObject($row){
        return new Feedback(
            $row['id'], 
            $row['user_id'], 
            $row['item_id'], 
            $row['sterren'],
            $row['commentaar']);
    }
    
}

?>