<?php
    session_start();

    if (isset($SESSION['user'])){
        header("Location: profile.php");
        exit();
    }

    include_once("def.php");
    $cr = "";
    if (isset($_POST["login"])){
        $cr = htmlspecialchars($_POST["login"]);

        if(isset($_POST["passw"])){
            $pass = htmlspecialchars($_POST["passw"]);
            $indice = chercherUser($cr, $pass);
            if ($indice >= 0){
                $usr = $lst[$indice];
                echo "ma classse de donnees: ". get_class($usr);
                $_SESSION['user']= serialize($usr);
                $_SESSION['nb'] = 0;
                $rep = "no";
                header("Location: profile.php");
                exit();
            }
            else{
                $rep = 'yes';
            }
        }
    }

    include_once("entete.php");
?>
<fieldset class="form-group border col-sm-6 p-4">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group row">
            <label for="inputlogin" class="col-sm-3 col-form-label">Nom d'utilisateur</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="inputlogin" placeholder="nom utilisateur" name="login" requiered>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Mot de passe</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="inputPassword" placeholder="mot de passe" name="passw">
            </div>
            <?php
                if (strtolower($rep) == 'yes'){
                    echo '<div class="col-sm-2"></div>';
                    echo '<div class="col-sm-10"><small id="loginhelp" class="text-danger">';
                    echo "Le nom d'utilisateur ou le mot de passe est incorrect!</small></div>";
                }
            ?>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button class="btn btn-primary">Me connecter</button>
            </div>
        </div>
    </form>
</fieldset>
<?php
    include_once("pied_page.php");
?>