<?php require_once("../include/header.inc.php") ?>
<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $request = "SELECT * FROM employes WHERE id_employes = :id_employes";
        $resultat = $pdo->prepare($request);
        $resultat->execute(['id_employes' => $_GET['id']]);
        $employes = $resultat->fetch(PDO::FETCH_ASSOC);
    }

    if(!empty($_POST)){
        $error = [];
        foreach($_POST as $indice => $input){
            if(empty($input)){
                $error[$indice] = 'le champ ' . $indice . ' est obligatoire (edit)';
            }
        }
        $employes = $_POST;
        if(!$error) {
            $request = "UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, salaire = :salaire";

            $data = [
                'prenom' => $_POST['employes']
            ]


        }
    }
?>


<h1 class="text-center my-5">Edit the employe</h1>

<div class="container">
    <form action="" method="post" class="border border-3 p-5 text-center shadow m-5 bg-light">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom </label>
            <input type="text" id="prenom" class="form-control" name="prenom" value="<?= $employes['prenom'] ?? ''; ?>">
            <small class="text-danger "><?= '*' . ($error['prenom'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?= $employes['nom'] ?? ''; ?>">
            <small class="text-danger"><?= "*" . ($error['nom'] ?? ""); ?></small>
        </div>
        <div class="mb-3">
            <label for="sexe">Sexe</label>
            <select class="form-select" name="sexe" id="sexe" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option <?= (isset($employes['sexe']) && $employes['sexe'] == 'm') ? "selected" : ""; ?> value="M">M</option>
                <option <?= (isset($employes['sexe']) && $employes['sexe'] == 'f') ? "selected" : ""; ?> value="F">F</option>
            </select>
            <small class="text-danger"><?= '*' . ($error['sexe'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="service">Your service</label>
            <select class="form-select" name="service" id="service" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'direction') ? "selected" : ""; ?> value="direction">direction</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'commercial') ? "selected" : ""; ?> value="commercial">commercial</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'production') ? "selected" : ""; ?> value="production">production</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'comptabilite') ? "selected" : ""; ?> value="comptabilite">comptabilite</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'informatique') ? "selected" : ""; ?> value="informatique">informatique</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'juridique') ? "selected" : ""; ?> value="juridique">juridique</option>
                <option <?= (isset($employes['service']) && $employes['service'] == 'assistant') ? "selected" : ""; ?> value="assistant">assistant</option>
            </select>
            <small class="text-danger"><?= '*' . ($error['service'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="salaire" class="form-label">Salaire</label>
            <input type="number" id="salaire" class="form-control" name="salaire" value="<?= $employes['salaire'] ?? ''; ?>">
            <small class="text-danger"><?= "*" . ($error['salaire'] ?? ''); ?></small>
        </div>
        <input type="submit" value="Envoyer" class="btn btn-outline-dark">
    </form>
</div>


<?php require_once("../include/footer.inc.php") ?>
