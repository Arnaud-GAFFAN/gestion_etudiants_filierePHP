<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiant_filiere;', 'root', '');
}catch(Exception $e){
    die('Erreur: ' . ' '. $e);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>

<form action="student_register.php" method="post">
    <div>
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="first_name">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="last_name" id="prenom">
        </div>
        <div>
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance">
        </div>
        <div>
            <label for="number">Numéro de Téléphone</label>
            <input type="number" name="number" id="number">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="gender">Sexe</label>
            <select name="gender" id="gender">
                <option value="Sélectionnez votre sexe" disabled></option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin" >Feminin</option>
            </select>
        </div>
        <div>
            <label for="filiere">Filière</label>
            <select name="filiere" id="filiere">
                <?php
                $request = $bdd->query('select * from filiere');

                while ($donnes = $request->fetch()){
                ?>
                <option value=<?php echo $donnes['id_filiere'] ?> ><?php echo $donnes['nom_filiere'] ?> </option>
                <?php
                }
                $request->closeCursor();
                ?>
            </select>
        </div>
        <input type="submit" value="Envoyer">
    </div>
</form>




<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/script.js"></script>

</body>
</html>

<?php
if ((isset($_POST['first_name'])) and !empty($_POST['first_name'])){
    if ((isset($_POST['last_name']) ) and !empty($_POST['last_name'])){
        if ((isset($_POST['date_naissance']))){
            if ((isset($_POST['number'])) and !empty($_POST['number'])){
                if ((isset($_POST['email'])) and !empty($_POST['email'])){
                    if ((isset($_POST['gender']))){
                        if ((isset($_POST['filiere']))){
                            $request = $bdd->prepare("insert into etudiant(nom, prenom, date_naissance, numero_telephone, email, sexe, id_filiere)
                            values (:nom, :prenom, :date, :numero, :email, :sexe, :filiere)");
                            $request->execute(array('nom' => $_POST['first_name'],
                                'prenom' => $_POST['last_name'],
                                'date' => $_POST['date_naissance'],
                                'numero' => $_POST['number'],
                                'email' => $_POST['email'],
                                'sexe' => $_POST['gender'],
                                'filiere' => $_POST['filiere']));

                            if ($request->rowCount() > 0){
                                echo '<div class="alert alert-success col-3" role="alert">
                                    Informations bien enregistré
                                </div>';
                            }
                        }else{
                            echo '<div class="alert alert-danger col-3" role="alert">
                                la filière n\'existe pas
                            </div>';
                        }
                    }else{
                        echo '<div class="alert alert-danger col-3" role="alert">
                            le sexe n\'existe pas
                        </div>';
                    }
                }else{
                    echo '<div class="alert alert-danger col-3" role="alert">
                        Veuillez renseigner votre email
                    </div>';
                }
            }else{
                echo '<div class="alert alert-danger col-3" role="alert">
                    Veuillez renseigner votre numéro de téléphone
                </div>';
            }
        }else{
            echo '<div class="alert alert-danger col-3" role="alert">
                Veuillez renseigner la date
            </div>';
        }
    }else{
        echo '<div class="alert alert-danger col-3" role="alert">
            Veuillez renseigner votre prénom
        </div>';
    }
}else{
    echo '<div class="alert alert-danger col-3" role="alert">
       Veuillez renseigner votre nom
    </div>';
}

$request->closeCursor();
