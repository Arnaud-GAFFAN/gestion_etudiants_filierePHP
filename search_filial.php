<?php
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiant_filiere;', 'root', '');
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

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Matricule</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom(s)</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Numéro de téléphone</th>
        <th scope="col">email</th>
        <th scope="col">Sexe</th>
        <th scope="col">Filière</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $request = $bdd->prepare("select * from etudiant where id_filiere= :filiere ");
    $request->execute(array('filiere' => $_POST['filiere']));

    while ($donnes = $request->fetch())
    {
    ?>
    <tr>
        <th scope="row"> <?php echo $donnes['matricule'] ?> </th>
        <td> <?php echo $donnes['nom'] ?> </td>
        <td> <?php echo $donnes['prenom'] ?></td>
        <td> <?php echo $donnes['date_naissance'] ?></td>
        <td> <?php echo $donnes['numero_telephone'] ?></td>
        <td> <?php echo $donnes['email'] ?></td>
        <td> <?php echo $donnes['sexe'] ?></td>
        <td> <?php echo $donnes['id_filiere'] ?></td>
    </tr>
        <?php
    }
    $request->closeCursor()
    ?>

    </tbody>
</table>

<a href="index.php">Retour  l'acceuil pour sélectionner une filiere</a>


<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
