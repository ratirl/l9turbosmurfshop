<?php
//    BestellingGeenId class with all the info from the database
//    uitsluitend gebruik om data in database te inserten
class BestellingGeenId {
    public $factuuradres;
    public $leveradres;
    public $levermethode;
    public $betaalmethode;

    public function __construct($factuuradres, $leveradres, $levermethode, $betaalmethode) {
        $this->factuuradres = $factuuradres;
        $this->leveradres = $leveradres;
        $this->levermethode = $levermethode;
        $this->betaalmethode = $betaalmethode;
    }


    //Extra functionality can be written here
    
}

?>