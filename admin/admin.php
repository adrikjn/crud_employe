<?php require_once('../include/header.inc.php'); ?>
<?php

$request = 'SELECT * FROM employes';
$result = $pdo->prepare($request);
$result->execute();

$employes = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="text-center my-5">Gestion Employes</h1>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">prenom</th>
                <th scope="col">nom</th>
                <th scope="col">sexe</th>
                <th scope="col">service</th>
                <th scope="col">date embauche</th>
                <th scope="col">salaire</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe) : ?>
                <tr>
                    <td><?= $employe['id_employes']; ?></td>
                    <td><?= $employe['prenom']; ?></td>
                    <td><?= $employe['nom']; ?></td>
                    <td><?= $employe['sexe']; ?></td>
                    <td><?= $employe['service']; ?></td>
                    <td><?= $employe['date_embauche']; ?></td>
                    <td><?= $employe['salaire']; ?></td>
                    <td>
                        <a href="seeEmployes.php?id=<?= $employe['id_employes']; ?>"><i class="bi bi-eye text-primary"></i></a>
                        <a href="editEmploye.php?id=<?= $employe['id_employes']; ?>"><i class="bi bi-pen text-warning"></i></a>
                        <a href="deleteEmploye.php?id=<?=$employe['id_employes']; ?>"><i class="bi bi-trash text-danger"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php require_once('../include/footer.inc.php') ?>