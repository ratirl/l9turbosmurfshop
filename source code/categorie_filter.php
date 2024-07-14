<?php
session_start();
// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de register pagina
    header("Location: register.php");
}
// variabele om de product id op te vangen vd form
$categorie = $_POST['categorie'];

$data["success"] = $categorie;
    echo json_encode($data);
?>