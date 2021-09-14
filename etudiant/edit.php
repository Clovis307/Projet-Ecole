<?php
// Start the session
session_start();
include 'connexion.php';
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="edit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php

    if (isset($_GET['ide'])) { //verification si on a un get
        //verification si l'information get egale a l'id dans la session

    ?>
        <div class="container">
            <h1>Modifier mes information</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">nom</label>
                        <input type="text" class="form-control" id="name" name="nom" value="<?php echo $nom; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prenom">prenom</label>
                        <input type="text" class="form-control" id="prenom" value="<?php echo $prenom; ?>" name="prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">genre</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="genre">
                        <option selected value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                        <option value="autre">autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="classe">classe</label>
                    <input type="text" class="form-control" id="classe" value="<?php echo $classe; ?>" name="classe">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="matricule">matricule</label>
                        <input type="text" class="form-control" id="matricule" value="<?php echo $matricule; ?>" name="matricule">
                    </div>
                </div>
                <div class="form-row">
                    <!-- <div class="form-group col-md-6"> -->
                    <label for="password">Mot de Passe</label>
                    <input type="password" class="form-control" id="password" placeholder="entrer votre mot de passe" name="password">
                    <!-- </div> -->
                </div>

                <div class="mb-3">
                    <label for="photo">photo</label>
                    <input type="file" class="form-control" id="photo" placeholder="ajouter une photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary" name="edit">Editer</button>
                <button type="submit" class="btn btn-danger" name="supprimer">supprimer</button>
            </form>

            <?php
            //edition
            if (isset($_POST['edit'])) {
                //collecte information

                $nom = addslashes($_POST['nom']);
                $prenom = addslashes($_POST['prenom']);
                $genre = addslashes($_POST['genre']);
                $classe = addslashes($_POST['classe']);
                $matricule = addslashes($_POST['matricule']);
                $password = md5(addslashes($_POST['password']));

                //mise a jour nom, prenom, genre,classe,matricule,photo,date_poste,motdepasse
                if ($password == "") {
                    $sql = "UPDATE etudiants SET nom='$nom',prenom='$prenom', genre ='$genre',classe='$classe' WHERE id='$id'";
                } else {
                    $sql = "UPDATE etudiants SET nom='$nom',prenom='$prenom', genre ='$genre',classe='$classe',motdepasse='$password' WHERE id='$id'";
                }


                if (mysqli_query($conn, $sql)) {
                    echo "Record updated successfully";
                    header('Location: page.php');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }

            //fin edition


            /// delete
            if (isset($_POST['supprimer'])) {
                $sql = "DELETE FROM etudiants WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "Record deleted successfully";
                    header('Location: logout.php');
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
            }


            ?>




        </div>

    <?php
    } else {
        header('Location: logout.php');
    }


    mysqli_close($conn); //fermer la connexion

    ?>


</body>

</html>