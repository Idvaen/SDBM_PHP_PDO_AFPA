<?php

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

class CouleurMGR
{
    public static function getListCouleur()
    {
        $sql = "SELECT * FROM couleur";
        $couleurs = Dao::getConnexion()->query($sql);
        $couleurs->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Couleur", array('id_couleur', 'nom_couleur'));
        $records = $couleurs->fetchAll();
        $couleurs->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $couleursA = $couleurs->fetchAll(PDO::FETCH_ASSOC);
        // return $couleurs;
    }
}