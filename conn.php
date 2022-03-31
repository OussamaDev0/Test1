<?php require_once('secrity.php')  ?>
<?php
/*mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("scolarite") or die (mysql_error());
*/
try {
    $strConnection = 'mysql:host=localhost;dbname=scolarite';
    $pdo = new PDO($strConnection,'root','');

}catch (PDOException $e)
{
    $msg = 'Erreur PDO dans '. $e->getMessage();
    die($msg);
}

?>