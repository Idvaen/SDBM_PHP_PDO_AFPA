<?php

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});
class PaysView
{
    private $id_pays;
    private $nom_pays = "";
    private $id_continent;
    private $nom_continent;
    public static $counter = 0;


    public function __construct($id_pays, $nom_pays, $id_continent, $nom_continent)
    {
        $this->setIdPays($id_pays);
        $this->setNomPays($nom_pays);
        $this->setIdContinent($id_continent);
        $this->setNomContinent($nom_continent);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . $this->getIdPays() . " Pays: " . $this->getNomPays() . " Continent: " . $this->getNomContinent() . ".";
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

    /**
     * Get the value of id_continent
     */
    public function getIdContinent()
    {
        return $this->id_continent;
    }

    /**
     * Set the value of id_continent
     */
    public function setIdContinent($id_continent): self
    {
        $this->id_continent = $id_continent;

        return $this;
    }

    /**
     * Get the value of nom_continent
     */
    public function getNomContinent()
    {
        return $this->nom_continent;
    }

    /**
     * Set the value of nom_continent
     */
    public function setNomContinent($nom_continent): self
    {

        $this->nom_continent = $nom_continent;

        return $this;
    }


    public static function getPropreListPays()
    {
        $sql = "SELECT id_pays, nom_pays, pays.id_continent, nom_continent FROM `pays` JOIN continent ON continent.id_continent = pays.id_continent;";
        $pays = Dao::getConnexion()->query($sql);
        $pays->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "PaysView", array('id_pays', 'nom_pays', 'id_continent', 'nom_continent'));
        $records = $pays->fetchAll();
        $pays->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $paysA = $pays->fetchAll(PDO::FETCH_ASSOC);
        // return $pays;
    }
}