<?php

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

class ContinentMGR
{
    public static function getListContinents()
    {
        $sql = "SELECT * FROM continent";
        $continents = Dao::getConnexion()->query($sql);
        $continents->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Continent", array('id_continent', 'nom_continent'));
        $records = $continents->fetchAll();
        $continents->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $continentsA = $continents->fetchAll(PDO::FETCH_ASSOC);
        // return $continents;
    }
}