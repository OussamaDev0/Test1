<?php require_once('secrity.php');
require_once('RoleScolarite.php');
?>
<?php
    require_once("conn.php");
    $code=$_GET['code'];
    $ps=$pdo->prepare("SELECT * FROM etudiants WHERE code=?");
    $params=array($code);
    $ps->execute($params);
    $etudiant=$ps->fetch();

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
    </head>
    <body>
    <?php require_once('entete.php')  ?>
        <div class="panel panel-default spacer col-md-6 col-xs-12 col-md-offset-3">
            <div class="panel-heading spacer">Editer l'étudient</div>
            <div class="panel-body">
                <form method="post" action="UpdateEtudiant.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="control-label">Code : </label><?php echo(" ".$etudiant['CODE']) ?>
                        <input type="hidden" value="<?php echo($etudiant['CODE']) ?>" name="code" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nom : </label>
                        <input type="text" value="<?php echo($etudiant['NOM']) ?>" name="nom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email : </label>
                        <input type="text" value="<?php echo($etudiant['EMAIL']) ?>" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Photo : </label>
                        <input type="file" name="photo" class="form-control"/>
                        <img src="images/<?php echo($etudiant['PHOTO'])?>" height=100 width=100/>
                    </div>
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>