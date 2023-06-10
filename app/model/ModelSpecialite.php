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
}
?>