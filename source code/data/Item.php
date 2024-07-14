<?php
//    Item class with all the info from the database
class Item {
    public $id;
    public $name;
    public $price;
    public $beschrijving;
    public $img;
    public $uitgelicht;
    public $categorie;

    public function __construct($id, $name, $price, $beschrijving, $img, $uitgelicht, $categorie) {
        $this->id = $id;
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