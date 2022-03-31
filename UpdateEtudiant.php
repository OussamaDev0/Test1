<?php require_once('secrity.php');
require_once('RoleScolarite.php');
  ?>
<?php
    $code=$_POST['code'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $nomPhoto=$_FILES['photo']['name'];//retourne le nom de fichier envoyer
    require_once('conn.php');
    if($nomPhoto==""){

        $ps=$pdo->prepare("UPDATE etudiants SET NOM=?,EMAIL=? WHERE CODE=?");//mise a jour la table dans BD
        $params=array($nom,$email,$code);
        $ps->execute($params);

    }
    else{
        $ficherTempo=$_FILES['photo']['tmp_name'];
    
        move_uploaded_file($ficherTempo,'./images/'.$nomPhoto);//copier la photo dans le dossier images
       
        $ps=$pdo->prepare("UPDATE etudiants SET NOM=?,EMAIL=?,PHOTO=? WHERE CODE=?");//mise a jour la table dans BD
        $params=array($nom,$email,$nomPhoto,$code);
        $ps->execute($params);

    }
    
    header("location:etudiants.php");
?>