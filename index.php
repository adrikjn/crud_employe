<?php require_once("include/header.inc.php") ?>

<?php

$request = ("SELECT nom, prenom, sexe, service FROM employes ORDER BY nom");
$result = $pdo->prepare($request);
$result->execute();
$employes = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="text-center my-5">Employes</h1>
<div class="container">
    <div class="row">
        <?php foreach ($employes as $employe) : ?>
        <div class="col-4 d-flex g-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $employe['nom'] . ' ' . $employe['prenom']; ?></h5>
                        <p class="card-text"><?= "sexe : " . $employe['sexe']; ?></p>
                        <a href="#" class="btn btn-primary">Must use it later</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>



<?php require_once("include/footer.inc.php") ?>