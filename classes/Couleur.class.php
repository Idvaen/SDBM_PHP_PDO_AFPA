<?php

class Couleur
{

    private $id_couleur;
    private $nom_couleur = "";
    public static $counter = 0;
    public function __construct($id_couleur, $nom_couleur)
    {
        $this->setIdCouleur($id_couleur);
        $this->setNomCouleur($nom_couleur);
        self::$counter++;
    }


    /**
     * Get the value of id_couleur
     */
    public function getIdCouleur()
    {
        return $this->id_couleur;
    }

    /**
     * Set the value of id_couleur
     */
    public function setIdCouleur($id_couleur): self
    {
        $this->id_couleur = $id_couleur;

        return $this;
    }

    /**
     * Get the value of nom_couleur
     */
    public function getNomCouleur()
    {
        return $this->nom_couleur;
    }

    /**
     * Set the value of nom_couleur
     */
    public function setNomCouleur($nom_couleur): self
    {
        $this->nom_couleur = $nom_couleur;

        return $this;
    }
}