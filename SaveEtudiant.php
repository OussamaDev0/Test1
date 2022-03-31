<?php require_once('secrity.php');
require_once('RoleScolarite.php');
  ?>
<?php
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $nomPhoto=$_FILES['photo']['name'];//retourne le nom de fichier envoyer
    $ficherTempo=$_FILES['photo']['tmp_name'];
    
    move_uploaded_file($ficherTempo,'./images/'.$nomPhoto);//copier la photo dans le dossier images
    require_once('conn.php');
    $ps=$pdo->prepare("INSERT INTO etudiants(NOM,EMAIL,PHOTO) VALUES (?,?,?)");//insere dans BD
    $params=array($nom,$email,$nomPhoto);
    $ps->execute($params);
    header("location:etudiants.php");
?>