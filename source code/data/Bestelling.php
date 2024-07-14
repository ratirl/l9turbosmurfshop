<?php
//    Bestelling class with all the info from the database
class Bestelling {
    public $id;
    public $user;
    public $factuuradres;
    public $leveradres;
    public $levermethode;
    public $betaalmethode;

    public function __construct($id, $user, $factuuradres, $leveradres, $levermethode, $betaalmethode) {
        $this->id = $id;
        $this->user = $user;
        $this->factuuradres = $factuuradres;
        $this->leveradres = $leveradres;
        $this->levermethode = $levermethode;
        $this->betaalmethode = $betaalmethode;
    }


    //Extra functionality can be written here
    
}

?>