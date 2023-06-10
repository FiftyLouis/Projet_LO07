<?php
require_once 'Model.php';

class ModelSpecialite{
    private $id, $label;

    public function __construct($id = NULL, $label = NULL)
    {
        if(!is_null($id)){
            $this->$id = $id;
            $this->$label = $label;
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
    public function getLabel()
    {
        return $this->label;
    }

    public static function getAll(){
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // retourne une liste des id
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($id){
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            return $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label){
        if(self::exist($label)){
            return NULL;
        }else{
            try {
                $database = Model::getInstance();

                $query = "select max(id) from specialite";
                $statement = $database->query($query);
                $tuple = $statement->fetch();
                $id = $tuple['0'];
                $id++;

                $query = "insert into specialite value (:id, :label)";
                $statement = $database->prepare($query);
                $statement->execute([
                    'id' => $id,
                    'label' => $label,
                ]);
                return $id;
            } catch (PDOException $e){
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                return NULL;
            }
        }
    }

    public static function exist($label){
        try{
            $database = Model::getInstance();
            $query = "select * from specialite where label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label,
            ]);
            $results = $statement->fetchAll();
            if (empty($results)){
                return FALSE;
            }
            else{
                return TRUE;
            }
        } catch(PDOException $e){
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>