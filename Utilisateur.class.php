<?php
class Utilisateur
{
    //Attirbuts
    private $m_user_name;
    private $m_user_pass;
    private $m_DateNaissance;
    private $m_Sexe;

    //Constructeur
    public function __construct($p_user, $p_pass){
        $this->m_user_name = $p_user;
        $this->m_user_pass = $p_pass;
    }

    //GETTER SETTER
    public function getNom(){
        return $this->m_user_name;
    }

    public function setNom($p_user_name){
        $this->m_user_name = $p_user_name;
    }

    public function setPasse($p_user_pass){
        $this->m_user_pass =$p_user_pass;
    }

    public function setDate($p_DateN){
        $this->m_DateNaissance = $p_DateN;
    }

    public function setSexe ($p_Sexe){
        $this->m_Sexe = $p_Sexe;
    }

    //METHODES
    public function verifPass($p_pass){
        return $p_pass == $this->m_user_pass;
    }

    public function getAge(){
        $aujd = new daateTime();
        if ($this->m_DateNaissence<>'' AND $aujd > $this->m_DateNaissance){
            $siff = date_diff($this->m_dateNaissance, $aujd);
            return $diff->format("%y ans");
        }
        return "La date de naissance est invalide";
    }

    public function getGenre(){
        if (strtoupper($this->m_Sexe)=='M'){
            return 'Homme';
        }
        if (strtoupper($this->m_Sexe)=='F'){
            return 'Femme';
        }
    }
}