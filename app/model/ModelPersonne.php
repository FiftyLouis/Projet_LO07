<!-----debut modelPersonne --->
<?php
require_once 'Model.php';

class ModelPersonne{
    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id, $honoraire;
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL, $honoraire = NULL)
    {
        if(!is_null($id)){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
            $this->honoraire = $honoraire;
        }
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed|null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed|null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed|null
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed|null
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @return mixed|null
     */
    public function getSpecialiteId()
    {
        return $this->specialite_id;
    }

    public static function connexion($login,$password){
        try{
            $database = Model::getInstance();
            $query = "select * from personne where login = :login and password = :password;";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            if($results){
                return $results[0];
            }else{
                return NULL;
            }
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }

    }

    public static function InsertPersonne($nom,$prenom,$adresse,$login,$password,$statut,$specialite_id, $honoraire){
        try{
            $database = Model::getInstance();
            $query = 'select max(id) from personne';
            $statement = $database->prepare($query);
            $statement->execute();
            $id = $statement->fetch();
            $id = $id[0]+1;

            $query = 'insert into personne value (:id,:nom, :prenom, :adresse, :login, :password, :statut,:specialite_id, :honoraire)';
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse'=>$adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite_id' => $specialite_id,
                'honoraire' => $honoraire
            ]);
            return $id;
        } catch(PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }

    public static function getAllPraticien(){
        try{
            $database = Model::getInstance();

            $query = "SELECT p.id, p.nom, p.prenom, p.adresse, s.label, p.honoraire FROM personne as p, specialite as s WHERE p.specialite_id = s.id AND p.statut=1 ORDER BY p.id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch(PDOException $e){
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function nbrPatricicenPatient(){
        try{
            $database = Model::getInstance();

            $query = "select p.id, p.nom, p.prenom, p.adresse, COUNT(r.praticien_id) from personne as p, rendezvous as r where p.id = r.patient_id and p.id !=0 GROUP BY r.patient_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }

    public static function getAllPatient(){
        try{
            $database = Model::getInstance();

            $query = "SELECT nom, prenom, adresse FROM `personne` WHERE personne.statut = 2 and id!=0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }

    public static function getAllAdmin(){
        try{
            $database = Model::getInstance();

            $query = "SELECT nom, prenom, adresse FROM `personne` WHERE personne.statut = 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return -1;
        }
    }

    public static function getPatientSansDoublon($id){
        try{
            $database = Model::getInstance();
            $query = "SELECT distinct p.nom , p.prenom , p.adresse from personne as p, rendezvous as r where r.patient_id = p.id and p.id != 0 and r.praticien_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $exception){
            printf("%s - %s<p/>\n", $exception->getCode(), $exception->getMessage());
            return NULL;
        }
    }

    public static function getCompte($id){
        try{
            $database = Model::getInstance();
            $query = "SELECT * from personne where id = :id";
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

    public static function getNomPraticien(){
        try {
            $database = Model::getInstance();
            $query = "select id, nom, prenom from personne where statut = :statut";
            $statement = $database->prepare($query);
            $statement->execute([
                'statut' => self::PRATICIEN
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getDispoPraticienPatient($id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT id, rdv_date FROM rendezvous WHERE patient_id=0 AND praticien_id = :id;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getPraticienHonoraire(){
        try {
            $database = Model::getInstance();
            $query = "SELECT p.nom, p.prenom, s.label, p.honoraire FROM personne as p , specialite as s where s.id = p.specialite_id and p.statut = 1 ORDER BY p.honoraire";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!--- fin modelPersonne --->
