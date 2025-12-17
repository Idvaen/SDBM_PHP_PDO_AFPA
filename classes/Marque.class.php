<?php

class Marque
{
    private $id_marque;
    private $nom_marque = "";
    private $id_fabricant = null;
    private $id_pays;
    public static $counter = 0;

    public function __construct($id_marque, $nom_marque, $id_fabricant, $id_pays)
    {
        $this->setIdMarque($id_marque);
        $this->setNomMarque($nom_marque);
        $this->setIdFabricant($id_fabricant);
        $this->setIdPays($id_pays);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . $this->getIdMarque() . " Marque: " . $this->getNomMarque() . " id_fabricant: " . $this->getIdFabricant() . " id_pays: " . $this->getIdPays() . ".";
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
}