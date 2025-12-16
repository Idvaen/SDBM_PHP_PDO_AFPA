<?php
class Fabricant
{

    private $id_fabricant;
    private $nom_fabricant = "";
    public static $counter = 0;
    public function __construct($id_fabricant, $nom_fabricant)
    {
        $this->setId($id_fabricant);
        $this->setFabricant($nom_fabricant);
        self::$counter++;
    }

    public function __toString(): string
    {
        return " ID: " . self::getId() . " Fabricant: " . self::getFabricant() . ".";
    }

    public function affichage()
    {
        return [self::getId(), self::getFabricant()];

    }

    /**
     * Get the value of id_fabricant
     */
    public function getId()
    {
        return $this->id_fabricant;
    }

    /**
     * Set the value of id_fabricant
     */
    public function setId($id_fabricant): self
    {
        $this->id_fabricant = $id_fabricant;

        return $this;
    }

    /**
     * Get the value of nom_fabricant
     */
    public function getFabricant(): string
    {
        return $this->nom_fabricant;
    }

    /**
     * Set the value of nom_fabricant
     */
    public function setFabricant(string $nom_fabricant): self
    {
        $this->nom_fabricant = $nom_fabricant;

        return $this;
    }
}
