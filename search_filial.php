<?php
try{
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

<form action="search_filial.php" method="get">
    <div>
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
        <input type="submit" value="Afficher">
</form>
<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/script.js"></script>
</body>
</html>
