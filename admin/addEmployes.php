<?php require_once("../include/header.inc.php") ?>

<?php 

    if(!empty($_POST)){
        $error = [];
        foreach($_POST as $indice => $input){
            if(empty($input)){
                $error[$indice] = 'le champ' . $indice . "est obligatoire";
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

        }
    }


?>














<h1 class="text-center my-5">Add a new employe</h1>

<div class="container">
    <form action="" method="post" class="border border-3 p-5 text-center shadow m-5 bg-light">
        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom </label>
            <input type="text" id="prenom" class="form-control" name="prenom">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" class="form-control" name="nom">
        </div>
        <div class="mb-3">
            <label for="sexe">Sexe</label>
            <select class="form-select" name="sexe" id="sexe" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="service">Your service</label>
            <select class="form-select" name="service" id="service" aria_label="Default select exemple">
                <option value="" selected disabled>Make a choice :</option>
                <option value="direction">direction</option>
                <option value="commercial">commercial</option>
                <option value="production">production</option>
                <option value="comptabilite">comptabilite</option>
                <option value="informatique">informatique</option>
                <option value="juridique">juridique</option>
                <option value="assistant">assistant</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" class="form-control" name="date">
        </div>
        <div class="mb-3">
            <label for="salaire" class="form-label">Salaire</label>
            <input type="text" id="salaire" class="form-control" name="salaire">
        </div>

    </form>
</div>


<?php require_once("../include/footer.inc.php") ?>