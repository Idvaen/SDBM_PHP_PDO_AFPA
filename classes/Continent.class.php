<?php

class Continent
{
    private $id_continent;
    private $nom_continent = "";
    public static $counter = 0;
    public function __construct($id_continent, $nom_continent)
    {
        $this->setIdContinent($id_continent);
        $this->setNomContinent($nom_continent);
        self::$counter++;
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
}