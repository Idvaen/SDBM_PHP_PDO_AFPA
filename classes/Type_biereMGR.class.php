<?php

require_once "Dao.class.php";
require_once "Type_biere.class.php";

class Type_biereMGR
{
    public static function getListTypeBiere()
    {
        $sql = "SELECT * FROM type_biere";
        $biere_types = Dao::getConnexion()->query($sql);
        $biere_types->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Type_biere", array('id_type_biere', 'nom_type_biere'));
        $records = $biere_types->fetchAll();
        $biere_types->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $fabricantsA = $biere_types->fetchAll(PDO::FETCH_ASSOC);
        // return $biere_types;
    }
}