<?php


spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

class MarqueView
{

    private $id_marque;
    private $nom_marque = "";
    private $id_fabricant = null;
    private $nom_fabricant = null;
    private $id_pays;
    private $nom_pays;
    public static $counter = 0;

    public function __construct($id_marque, $nom_marque, $id_fabricant, $nom_fabricant, $id_pays, $nom_pays)
    {
        $this->setIdMarque($id_marque);
        $this->setNomMarque($nom_marque);
        $this->setIdFabricant($id_fabricant);
        $this->setIdPays($id_pays);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . $this->getIdMarque() . " Marque: " . $this->getNomMarque() . " Fabricant: " . $this->getNomFabricant() . " Pays: " . $this->getNomPays() . ".";
    }

    public static function getPropreListDeMarques()
    {
        $sql = "SELECT id_marque, nom_marque, marque.id_fabricant, nom_fabricant, marque.id_pays, nom_pays FROM `marque`
                JOIN pays ON pays.id_pays = marque.id_pays
                LEFT JOIN fabricant ON fabricant.id_fabricant = marque.id_fabricant;";
        $marques = Dao::getConnexion()->query($sql);
        // $marques->execute(array(":pays_id_pays"=> Pays::getIdPays(),));
        $marques->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "MarqueView", array('id_marque', 'nom_marque', 'id_fabricant', 'nom_fabricant', 'id_pays', 'nom_pays'));
        $records = $marques->fetchAll();
        $marques->closeCursor();
        return $records;
    }


    /**
     * Get the value of id_marque
     */
    public function getIdMarque()
    {
        return $this->id_marque;
    }

    /**
     * Set the value of id_marque
     */
    public function setIdMarque($id_marque): self
    {
        $this->id_marque = $id_marque;

        return $this;
    }

    /**
     * Get the value of nom_marque
     */
    public function getNomMarque()
    {
        return $this->nom_marque;
    }

    /**
     * Set the value of nom_marque
     */
    public function setNomMarque($nom_marque): self
    {
        $this->nom_marque = $nom_marque;

        return $this;
    }

    /**
     * Get the value of id_fabricant
     */
    public function getIdFabricant()
    {
       if ($this->id_fabricant === null)
            return "NULL";
        return $this->id_fabricant;
    }

    /**
     * Set the value of id_fabricant
     */
    public function setIdFabricant($id_fabricant): self
    {
        $this->id_fabricant = $id_fabricant;

        return $this;
    }

    /**
     * Get the value of nom_fabricant
     */
    public function getNomFabricant()
    {
        if ($this->nom_fabricant === null)
            return "NULL";
        return $this->nom_fabricant;
    }

    /**
     * Set the value of nom_fabricant
     */
    public function setNomFabricant($nom_fabricant): self
    {
        $this->nom_fabricant = $nom_fabricant;

        return $this;
    }

    /**
     * Get the value of id_pays
     */
    public function getIdPays()
    {
        return $this->id_pays;
    }

    /**
     * Set the value of id_pays
     */
    public function setIdPays($id_pays): self
    {
        $this->id_pays = $id_pays;

        return $this;
    }

    /**
     * Get the value of nom_pays
     */
    public function getNomPays()
    {
        return $this->nom_pays;
    }

    /**
     * Set the value of nom_pays
     */
    public function setNomPays($nom_pays): self
    {
        $this->nom_pays = $nom_pays;

        return $this;
    }
}