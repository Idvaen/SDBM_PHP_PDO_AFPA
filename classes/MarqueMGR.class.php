<?php

require_once "Dao.class.php";
require_once "Marque.class.php";

class MarqueMGR {
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
}