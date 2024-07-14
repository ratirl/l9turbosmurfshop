<?php
//    ItemGeenId class with all the info from the database
//    uitsluitend gebruik om data in database te inserten
class ItemGeenId {
    public $name;
    public $price;
    public $beschrijving;
    public $img;
    public $uitgelicht;
    public $categorie;

    public function __construct($name, $price, $beschrijving, $img, $uitgelicht, $categorie) {
        $this->name = $name;
        $this->price = $price;
        $this->beschrijving = $beschrijving;
        $this->img = $img;
        $this->uitgelicht = $uitgelicht;
        $this->categorie = $categorie;
    }


    //Extra functionality can be written here
    
}

?>