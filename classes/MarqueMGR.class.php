<?php

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

class MarqueMGR
{
    public static function getListMarques()
    {
        $sql = "SELECT * FROM marque";
        $marques = Dao::getConnexion()->query($sql);
        $marques->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Marque", array('id_marque', 'nom_marque', 'id_fabricant', 'id_pays'));
        $records = $marques->fetchAll();
        $marques->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $marquesA = $marques->fetchAll(PDO::FETCH_ASSOC);
        // return $marques;
    }


    // public static function getPropreListDeMarques()
    // {
    //     $sql = "SELECT id_marque, nom_marque, nom_fabricant, nom_pays FROM `marque`
    //             JOIN pays
    //             ON :pays_id_pays = :marque_id_pays
    //             JOIN fabricant
    //             ON :fabricant_id_fabricant = :marque_id_fabricant;";
    //     $marques = Dao::getConnexion()->prepare($sql);
    //     // $marques->execute(array(":pays_id_pays"=> Pays::getIdPays(),));
    //     $marques->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Marque", array('id_marque', 'nom_marque', 'id_fabricant', 'id_pays'));
    //     $records = $marques->fetchAll();
    //     $marques->closeCursor();
    //     return $records;
    // }
}