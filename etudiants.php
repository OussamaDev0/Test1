<?php require_once('secrity.php')  ?>
<?php
    
    require_once('conn.php');  //inclusion de connection avec DB
    $mc="";
    $size=3;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=0;
    }
    $offset=$page*$size;
    if(isset($_GET['motCle'])){
        $mc=$_GET['motCle'];
        $req ="SELECT * FROM etudiants WHERE (NOM LIKE '%$mc%') LIMIT $size OFFSET $offset";
    }
    else {
        $req ="SELECT * FROM etudiants LIMIT $size OFFSET $offset";

    }
    
    $ps=$pdo->prepare($req);
    $ps->execute();
    if(isset($_GET['motCle']))
    $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_E FROM etudiants LIKE '%$mc%' ");
    else
    $ps2=$pdo->prepare("SELECT COUNT(*) AS NB_E FROM etudiants");

    $ps2->execute();
    $ligne=$ps2->fetch(PDO::FETCH_ASSOC);
    $NBE=$ligne['NB_E'];
    if(($NBE % $size)==0) $NbPages=floor($NBE / $size);
    else
    $NbPages=floor($NBE / $size)+1;

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
    </head>
    <body>
        <?php require_once('entete.php')  ?>
        <div class="col-md-12 col-xs-12 spacer">
                <form methode="get" action="etudiants.php">
                    <div class="form-group spacer">
                        <label class="control-label">Mot clé : </label>
                        <input type="text" name="motCle" value="<?php echo($mc) ?>" />
                        <button type="submit">Chercher</button>
                    </div>
                </form>
        </div>
<div class="col-md-12 col-xs-12 spacer">
    <div class="panel panel-info spacer">
        <div class="panel-heading">Liste des étudiants</div>
        <div class="panel-body">
        
        <table class="table table-striped">
        <thead>
            <tr>
                <th>CODE</th><th>NOM</th><th>EMAIL</th><th>PHOTO</th>
            </tr>    
        </thead>
        <tbody>
            <?php while ($et=$ps->fetch()) { ?>
            <tr>
                <td><?php echo($et['CODE'])  ?> </td>
                <td><?php echo($et['NOM'])  ?> </td>
                <td><?php echo($et['EMAIL'])  ?> </td>
                <td><img src="images/<?php echo($et['PHOTO'])?>" width="100" height="100" ></td>
                <td><a href="EditEtudiant.php?code=<?php echo($et['CODE'])?>">Edit</a></td>
                <td><a onclick="return confirm('Eter vous sure..?')" href="SupprimeEtudiant.php?code=<?php echo($et['CODE'])?>">Supprimer</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>

        </div>
        <div>
            <ul class="nav nav-pills">
                <?php  
                    $i=0;
                    while($i<$NbPages){
                ?>
                <li <?php if(($page==$i)) echo("class='active'"); ?> >
                    <a href="etudiants.php?page=<?php echo($i) ?>">page <?php echo($i) ?></a>
                </li>
                        <?php $i++; } ?>
            </ul>
            
        </div>
    </div>

    
</div>
    </body>
</html>