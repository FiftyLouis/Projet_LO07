<?php
require_once 'Model.php';

class ModelRendezVous{

    private $id, $patient_id, $praticien_id, $rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL)
    {
        if(!is_null($id)){
            $this->$id = $id;
            $this->$patient_id = $patient_id;
            $this->$praticien_id = $praticien_id;
            $this->$rdv_date = $rdv_date;
        }
    }

    public static function getAllRdv(){
        try{
            $database = Model::getInstance();

            $query = "select p.nom, p2.nom , r.rdv_date from rendezvous as r, personne as p, personne as p2 where p.id = r.patient_id and p2.id = r.praticien_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }
}
?>