<?php 
require_once("../include/init.inc.php");

if(isset($_GET['id'])){
    $request = "DELETE FROM employes WHERE id_employes = :id_employes";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_employes' => $_GET['id']]);


    header("Location: admin.php");
    exit();
}



?>