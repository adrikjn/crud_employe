<?php require_once('../include/header.inc.php'); ?>

<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $request = "SELECT * FROM employes WHERE id_employes = :id_employes";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_employes' => $id]);
    $employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php foreach($employes as $employe) : ?>
<h1 class="text-center my-5">About <?=$employe['prenom'] . " " . $employe['nom']; ?></h1>

<p class="text-center text-primary"><?= $employe['nom'] . " " . $employe['prenom'] . " a rejoint l'entreprise le " . $employe['date_embauche'] . " son rôle est " . $employe['service'] . " et il est rémunéré d'une valeure de" . " " . $employe['salaire']; ?></p>


<?php endforeach ?>

<?php require_once('../include/footer.inc.php'); ?>