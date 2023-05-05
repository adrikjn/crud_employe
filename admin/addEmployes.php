<?php require_once("../include/header.inc.php") ?>

<?php 

    if(!empty($_POST)){
        $error = [];
        foreach($_POST as $indice => $input){
            if(empty($input)){
                $error[$indice] = 'le champ ' . $indice . " est obligatoire";
            }
        };
        if(!$error){
            $request = "INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :date_embauche, :salaire)";
            $data = [
                ":prenom" => $_POST['prenom'],
                ":nom" => $_POST['nom'],
                ":sexe" => $_POST['sexe'],
                ":service" => $_POST['service'],
                ":date_embauche" => $_POST['date'],
                ":salaire" => $_POST['salaire']
            ];
            $result = $pdo->prepare($request);
            $result->execute($data);
        }
    }


?>














<h1 class="text-center my-5">Add a new employe</h1>

<div class="container">
    <form action="" method="post" class="border border-3 p-5 text-center shadow m-5 bg-light">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom </label>
            <input type="text" id="prenom" class="form-control" name="prenom" value="<?= $_POST['prenom'] ?? ''; ?>">
            <small class="text-danger "><?= '*' . ($error['prenom'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom" value="<?= $_POST['nom'] ?? ''; ?>">
            <small class="text-danger"><?= "*" . ($error['nom'] ?? ""); ?></small>
        </div>
        <div class="mb-3">
            <label for="sexe">Sexe</label>
            <select class="form-select" name="sexe" id="sexe" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option <?= (isset($_POST['sexe']) && $_POST['sexe'] == 'M') ? "selected" : ""; ?> value="M">M</option>
                <option <?= (isset($_POST['sexe']) && $_POST['sexe'] == 'F') ? "selected" : ""; ?> value="F">F</option>
            </select>
            <small class="text-danger"><?= '*' . ($error['sexe'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="service">Your service</label>
            <select class="form-select" name="service" id="service" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'direction') ? "selected" : ""; ?> value="direction">direction</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'commercial') ? "selected" : ""; ?> value="commercial">commercial</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'production') ? "selected" : ""; ?> value="production">production</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'comptabilite') ? "selected" : ""; ?> value="comptabilite">comptabilite</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'informatique') ? "selected" : ""; ?> value="informatique">informatique</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'juridique') ? "selected" : ""; ?> value="juridique">juridique</option>
                <option <?= (isset($_POST['service']) && $_POST['service'] == 'assistant') ? "selected" : ""; ?> value="assistant">assistant</option>
            </select>
            <small class="text-danger"><?= '*' . ($error['service'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" class="form-control" name="date">
            <small class="text-danger"><?= "*" . ($error['date'] ?? ''); ?></small>
        </div>
        <div class="mb-3">
            <label for="salaire" class="form-label">Salaire</label>
            <input type="number" id="salaire" class="form-control" name="salaire">
            <small class="text-danger"><?= "*" . ($error['salaire'] ?? ''); ?></small>
        </div>
        <input type="submit" value="Envoyer" class="btn btn-outline-dark">
    </form>
</div>


<?php require_once("../include/footer.inc.php") ?>