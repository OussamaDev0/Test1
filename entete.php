<?php require_once('secrity.php')  ?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <ul class="navbar-nav nav">
        <li><a href="etudiants.php">Etudiants</a></li>
        <li><a href="SaisieEtudiant.php">Saisie</a></li>
        <li><a href="LogOut.php">LogOut [<?php echo($_SESSION['PROFILE']['LOGIN']) ?>]</a></li>
    </ul>

</div>