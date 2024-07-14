<?php
//    Feedback class with all the info from the database
//    uitsluitend gebruik om data in database te inserten
class FeedbackGeenId {
    public $user_id;
    public $item_id;
    public $sterren;
    public $commentaar;
    public $naam;
    public $voornaam;
    public $email;

    public function __construct($user_id, $item_id, $sterren, $commentaar) {
        $this->user_id = $user_id;
        $this->item_id = $item_id;
        $this->sterren = $sterren;
        $this->commentaar = $commentaar;
    }


    //Extra functionality can be written here
    
}

?>