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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPatientId()
    {
        return $this->patient_id;
    }

    /**
     * @return mixed
     */
    public function getPraticienId()
    {
        return $this->praticien_id;
    }

    /**
     * @return mixed
     */
    public function getRdvDate()
    {
        return $this->rdv_date;
    }

    public static function getAllRdv(){
        try{
            $database = Model::getInstance();

            $query = "select p.nom, p2.nom , r.rdv_date from rendezvous as r, personne as p, personne as p2 where p.id = r.patient_id and p2.id = r.praticien_id and r.patient_id !=0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }
    public static function getDispo($id){
        try{
            $database = Model::getInstance();
            $query = "SELECT r.rdv_date from rendezvous as r WHERE r.praticien_id = :id and r.patient_id = 0";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,

            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }
    }

    public static function Exist($id,$date){
        try{
            $date = $date. ' à 10h00';
            $database = Model::getInstance();
            $query = "SELECT * from rendezvous as r WHERE r.praticien_id = :id and r.rdv_date like :date";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'date' => $date
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezvous");
             if(empty($results)){
                return FAlSE;
            }else {
                return TRUE;
            }
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }
    }

    public static function InsertRdv($idPrat,$date){
        try{
            $database = Model::getInstance();

            $query = "select max(id) from rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            $patient = 0;

            $query = "insert into rendezvous value (:id, :patient_id, :praticien_id, :rdv_date)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'patient_id' => $patient,
                'praticien_id' => $idPrat,
                'rdv_date'=>$date
            ]);
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }
    }

    public static function getRdv($id){
        try{
            $database = Model::getInstance();
            $query = "SELECT p.nom , p.prenom , r.rdv_date from personne as p, rendezvous as r where p.id = r.patient_id and r.praticien_id = :id and p.id != 0";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }
    }




}
?>