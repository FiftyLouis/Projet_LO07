<!-----debut modelPersonne --->
<?php
require_once 'Model.php';

class ModelPersonne{
    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id;
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL)
    {
        if($this->$id = NULL){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
        }
    }
}