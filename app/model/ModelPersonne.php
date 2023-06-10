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

    public static function getUser($username){

    }
}
?>
<!--- fin model --->
