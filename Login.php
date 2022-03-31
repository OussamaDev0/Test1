<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
    </head>
    <body>
        <div class="panel panel-default spacer col-md-6 col-xs-12 col-md-offset-3">
            <div class="panel-heading spacer">Authentification</div>
            <div class="panel-body">
                <form method="post" action="Authentifier.php">
                    <div class="form-group">
                        <label class="control-label">Login: </label>
                        <input type="text" name="username" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mot de passe : </label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div>
                        <button type="submit">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>