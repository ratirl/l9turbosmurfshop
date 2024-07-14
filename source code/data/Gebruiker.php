<?php
//    Gebruiker class with all the info from the database
class Gebruiker {
    public $id;
    public $username;
    public $wachtwoord;


    public function __construct($id, $username, $wachtwoord) {
        $this->id = $id;
        $this->username = $username;
        $this->wachtwoord = $wachtwoord;

    }


    //Extra functionality can be written here
    
}

?>