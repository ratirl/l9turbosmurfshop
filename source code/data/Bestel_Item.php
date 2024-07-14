<?php
//    Bestel_Item class with all the info from the database
class Bestel_Item {
    public $id;
    public $bestelling_id;
    public $item_id;
    public $aantal;
    public $totaalprijs;

    public function __construct($id, $bestelling_id, $item_id, $aantal, $totaalprijs) {
        $this->id = $id;
        $this->bestelling_id = $bestelling_id;
        $this->item_id = $item_id;
        $this->aantal = $aantal;
        $this->totaalprijs = $totaalprijs;
    }


    //Extra functionality can be written here
    
}

?>