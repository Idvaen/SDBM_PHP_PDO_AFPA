<?php

class Dao
{
    private static $connection = null;
    private static function dao_connexion()
    {
        $ini_file = "param.ini";
        if ($param = parse_ini_file($ini_file, true))
            extract($param["DB"]);
        else
            die("Pas de fichier param.ini");
        $dsn = "mysql:dbname=" . $DBNAME . ";host=" . $DBHOST . ";port=" . $DBPORT;

        try {
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $connexion = new PDO($dsn, $DBUSER, $DBPASS, $option);
            return $connexion;

        } catch (PDOException $e) {
            printf("Echec connexion : %s\n", $e->getMessage());
        }
    }

    public static function getConnexion(): PDO{
        if (self::$connection == null) 
            return self::dao_connexion();
        else 
            return self::$connection;
    }

    public static function deconnect(): null{
        return self::$connection = null;
    }
}

