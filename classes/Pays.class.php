<?php

class Pays
{
    private $id_pays;
    private $nom_pays = "";
    private $id_continent;
    public static $counter = 0;


    public function __construct($id_pays, $nom_pays, $id_continent)
    {
        $this->setIdPays($id_pays);
        $this->setNomPays($nom_pays);
        $this->setIdContinent($id_continent);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . self::getIdPays() . " Pays: " . self::getNomPays() . " Continent: " . self::getIdContinent() . ".";
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
}