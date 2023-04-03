<?php
    require_once 'Utilisateur.class.php';
    $u = new Utilisateur('Ali', '123456');
    $u->setDate(date_create("200-03-15"));
    $u->setSexe('M');
    $j = new Utilisateur('jacob', 'asdfgh');
    $j->setDate(date_create("1980-06-10"));
    $j->setSexe('M');
    $lst = array($u, $j, new Utilisateur('mathieu', 'qwerty'));
    $lst[3] = new Utilisateur('france', 'azerty');
    $rep = '';

    function chercherUser ($username, $pass){
        $maliste = $GLOBALS["lst"];
        for ($i = 0; $i <count($maliste); $i++){
            $usr = $maliste[$i];
            if ($username == $usr->getNom()){
                return $i;
            }        
        }
        return -1;
    }

?>