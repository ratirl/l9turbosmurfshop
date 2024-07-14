<?php
//    Feedback class with all the info from the database
class Feedback {
    public $id;
    public $user_id;
    public $item_id;
    public $sterren;
    public $commentaar;

    public function __construct($id, $user_id, $item_id, $sterren, $commentaar) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->sterren = $sterren;
        $this->commentaar = $commentaar;
    }


    //Extra functionality can be written here
    
}

?>