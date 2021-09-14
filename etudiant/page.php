<?php
 session_start();
//Vérrification de connection
include 'connexion.php';
include 'session.php';


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: black;
  background-color: #FFF;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">Profil utilisateur</h2>

<div class="card">
  <img src="<?php echo $image; ?>"  style="width:100%">
  <h1><?php echo $nom. " ".$prenom ; ?>  </h1>
  <p class="title"><?php echo $matricule ; ?></p>
  <p>Depuis le <?php echo $date_post ; ?> </p>
  <div style="margin: 24px 0;">
    <a href="edit.php?ide=<?php echo $id;?>"><img src="edit.png"  style="width:10%"></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button ><a href='logout.php'>deconnexion</a></button></p>

</div>

</body>
</html>
