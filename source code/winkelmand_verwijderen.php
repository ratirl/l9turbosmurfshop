<?php
session_start();
if (isset($_POST["id"])) {
// we nemen de waarde vd winkelmandproduct id
// uit de body met ajax en sturen dit terug
// met de suffix vd table row waarin hij zich bevindt
// om dit zo met ajax te verwijderen zonder 
// dat de pagina vernieuwt
    $id = $_POST["id"];
    $data["success"] = "#tr_met_id_" . $id;
    echo json_encode($data);
// we zoeken in de session winkelmand array
// naar de index met als product id de id uit de POST
// en verwijderen dit uit de session
    for ($i = 0; $i < count($_SESSION['winkelmand']); $i++) {
        if ($_SESSION['winkelmand'][$i]['id'][0] == $id) {
            unset($_SESSION['winkelmand'][$i]);
// sort om de array indexen terug samen te trekken
            sort($_SESSION['winkelmand']);
            
        }
    }
}

?>