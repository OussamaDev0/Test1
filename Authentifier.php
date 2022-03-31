
<?php
    $login=$_POST['username'];
    $pass=md5($_POST['password']);
    require_once('conn.php');
    $ps=$pdo->prepare("SELECT * FROM users WHERE LOGIN=? AND PASSWORD=?");
    $params=array($login,$pass);
    $ps->execute($params);
    if($user=$ps->fetch()){
        session_start();
        $_SESSION['PROFILE']=$user;
        header("location:etudiants.php");
    }
    else{
        header("location:Login.php");
    }
    
?>