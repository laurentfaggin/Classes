<?php
    session_start();
    if (isset($_POST["logout"])){
        if ($_POST["logout"] == 'Se deconnecter'){
            session_unset();
            session_destroy();
        }
    }
    if (isset($_SESSION['user'])){
        require 'Classes/Utilisateur.class.php';
        $myuser = unserialize($_SESSION['user']);
    }
    else{
        echo "session vide: <br>";
        header("Location: login.php");
        exit();
    }
    require_once("entete.php");
    $nb = 1;
    if (isset ($_SESSION['nb'])){
        $_SESSION['nb']++;
        $nb = $_SESSION['nb'];
    }

    echo "<h6 class='text-primary'>Bonjour, vous etes connecte avec ";
    echo "le conmpte: ".$myuser->getNom()."</h6>";
    echo "votre age: ".$myuser->getAge();
    echo "<br>votre genre: ".$myuser->getGenre();
    echo "<br>nombre de visites: $nb <br>";
    echo 'form action="'.$_SERVER['PHP_SELF'].'" method="post">';
    echo '<input type="submit" name="logout" class="btn btn-primary" ';
    echo 'value="Se deconnecter" />';
    echo '</form>';
    require_once("pied_page.php");
?>