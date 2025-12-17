<?php

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

class PaysMGR
{
    public static function getListPays()
    {
        $sql = "SELECT * FROM pays";
        $pays = Dao::getConnexion()->query($sql);
        $pays->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Pays", array('id_pays', 'nom_pays', 'id_continent'));
        $records = $pays->fetchAll();
        $pays->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $paysA = $pays->fetchAll(PDO::FETCH_ASSOC);
        // return $pays;
    }



}