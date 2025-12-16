<?php


class Type_biere
{
    private $id_type_biere;
    private $nom_type_biere = "";
    public static $counter = 0;
    public function __construct($id_type_biere, $nom_type_biere)
    {
        $this->setIdTypeBiere($id_type_biere);
        $this->setNomTypeBiere($nom_type_biere);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . self::getIdTypeBiere() . " Type de biere: " . self::getNomTypeBiere() . ".";
    }


    /**
     * Get the value of id_type_biere
     */
    public function getIdTypeBiere()
    {
        return $this->id_type_biere;
    }

    /**
     * Set the value of id_type_biere
     */
    public function setIdTypeBiere($id_type_biere): self
    {
        $this->id_type_biere = $id_type_biere;

        return $this;
    }

    /**
     * Get the value of nom_type_biere
     */
    public function getNomTypeBiere()
    {
        return $this->nom_type_biere;
    }

    /**
     * Set the value of nom_type_biere
     */
    public function setNomTypeBiere($nom_type_biere): self
    {
        $this->nom_type_biere = $nom_type_biere;

        return $this;
    }
}