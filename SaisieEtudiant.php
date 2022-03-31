<?php require_once('secrity.php');
        require_once('RoleScolarite.php');
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
            <div class="panel-heading spacer">Saisie des étudiants</div>
            <div class="panel-body">
                <form method="post" action="SaveEtudiant.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label">Nom : </label>
                        <input type="text" name="nom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email : </label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Photo : </label>
                        <input type="file" name="photo" class="form-control"/>
                    </div>
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>