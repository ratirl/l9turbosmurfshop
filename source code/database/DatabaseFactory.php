<?php 

include_once 'database/Database.php';

class DatabaseFactory {
    
    //singleton
    private static $connection;
    
    public static function getDatabase(){
       
       if (self::$connection == null) {
            $url = "dt5.ehb.be";
            $user = "1819JAVAADV026";
            $passw = "tidu52";
            $db = "1819JAVAADV026";
            self::$connection = new Database($url, $user, $passw, $db);
        }
       
      
        return self::$connection; 
    }
    
}
    
?>