<?php
// Start the session
session_start();
?>
<?php
//Inclusion de la connexion à la BD
include 'connexion.php';
//enregistrement
if (isset($_POST['envoyer'])) {
    $nom = addslashes($_POST['nom']);
    $prenom = addslashes($_POST['prenom']);
    $genre = addslashes($_POST['genre']);
    $classe = addslashes($_POST['classe']);
    $matricule = addslashes($_POST['matricule']);
    $password = md5(addslashes($_POST['password']));


    //check user
    $check = "SELECT * FROM etudiants WHERE matricule ='$matricule'";
    $result = mysqli_query($conn, $check);
    $nombre = mysqli_num_rows($result);
    //a = 2
    //si a = 0 display 5 sinon display 4
    echo $matricule . '-';
    //ajout d'image

    $target_dir = "image/"; //dossier de reception
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    //if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //renomer l'image
    $temp = explode(".", $_FILES["photo"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $finaldestination = $target_dir . $newfilename;
    //}
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], "" . $finaldestination)) {
            echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($nombre == 0) {
        //insertion
        $sql = "INSERT INTO etudiants (nom, prenom, genre,classe,matricule,photo,date_poste,motdepasse)
VALUES ('$nom', '$prenom', '$genre' , '$classe' ,'$matricule' ,'$finaldestination','$date_poste', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully ";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo 'eleve existe';
    }
}
//fin enregistrement
//login
if (isset($_POST['login'])) {
    $matricule = addslashes($_POST['matricule']);
    $password = md5(addslashes($_POST['password']));

    //check user
    $check = "SELECT * FROM etudiants WHERE matricule ='$matricule' AND motdepasse = '$password' ";
    $result = mysqli_query($conn, $check);
    $nombre = mysqli_num_rows($result);
    //a = 2
    //si a = 0 display 5 sinon display 4

    if ($nombre == 1) {
        //aller à la page 
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        //Création de la session
        $_SESSION["id"] = $id;
        header('Location: page.php');
    } else {
        //afficher message d'erreure
        echo "mot de passe eronné";
    }
}


//fin login
mysqli_close($conn);
?>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>Créer un nouveau compte</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>ou utilisez vos identifiants pour vous connecter</span>
            <input type="text" placeholder="entrer votre nom" id="name" name="nom" />
            <input type="text" placeholder="entrer votre prenom" name="prenom" id="prenom" />
            <select name="genre">
                <option selected>choisir</option>
                <option value="homme">homme</option>
                <option value="femme">femme</option>
                <option value="autre">autre</option>
            </select>
            <input type="text" placeholder="entrer votre classe" name="classe" id="classe" />
            <input type="text" placeholder="entrer votre matricule" id="matricule" name="matricule" />
            <input type="password" id="password" name="password" placeholder="entrer votre mot de passe" />
            <input type="file" id="photo" name="photo" placeholder="">


            <button type="submit" name="envoyer">Enregistrement</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="" method="post">
            <h1>connexion</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>ou utilisez votre compte</span>
            <input type="text" id="matricule" name="matricule" placeholder="entrer votre matricule" />
            <input type="password" id="password" name="password" placeholder="entrer votre mot de passe" />

            <button type="submit" name="login">connexion</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Hey content de te revoir!</h1>
                <p>
                    Veuillez entrer vos identifiants pour vous connecter
                </p>
                <button class="ghost" id="signIn">connexion</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Soyez les Bienvenues!</h1>
                <p>Entrez vos informations personnelles et débutez votre expérience</p>
                <button class="ghost" id="signUp">Enregistrement</button>
            </div>
        </div>
    </div>


</div>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="etudiant.css">
</head>




<script src="etudiant.js"></script>