

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

    <div>
        <div>
            <a href="./student_register.php">Enregistrer un nouvel étudiant</a>
            <i class="ri-user-add-fill"></i>
        </div>
        <div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Afficher la liste</button>
                <i class="ri-arrow-right-line"></i>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="search_filial.php" method="post">
                                <label for="filiere" class="form-label">Filière</label>
                                <select name="filiere" id="filiere" class="form-select">
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
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>