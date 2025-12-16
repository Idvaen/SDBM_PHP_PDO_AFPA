<?php

require_once "Dao.class.php";
require_once "Fabricant.class.php";

class FabricantsMGR
{
    public static function getListFabricants()
    {
        $sql = "select * from fabricant";
        $fabricants = Dao::getConnexion()->query($sql);
        $fabricants->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Fabricant", array('id_fabricant', 'nom_fabricant'));
        $records = $fabricants->fetchAll();
        $fabricants->closeCursor();
        return $records;

        // $rs->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "className", array(<liste des arguments>));
        // $fabricantsA = $fabricants->fetchAll(PDO::FETCH_ASSOC);
        // return $fabricants;
    }

    public static function getFabricantById($id): PDO
    {
        $sql = "select * from fabricant where id_fabricant in (?)";
        $reponse = Dao::getConnexion()->prepare($sql);
        $reponse->execute(array($id));
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }

    public static function getFabricantByName($fabNom): array
    {
        $sql = "select * from fabricant where nom_fabricant like :fabNom";
        $reponse = Dao::getConnexion()->prepare($sql);
        $reponse->execute(array(":fabNom" => "%$fabNom%"));
        $fabric_names = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $fabric_names;
    }

    public static function addFabricant(Fabricant $fabricant): string
    {
        $sql = "INSERT INTO fabricant VALUES (:id_fabricant, :nom_fabricant);";
        $reponse = Dao::getConnexion()->prepare($sql);
        try {
            $reponse->execute(array(":id_fabricant" => $fabricant->getId(), ":nom_fabricant" => $fabricant->getFabricant()));
        } catch (PDOException $e) {
            return 0;
        }
        return 1;
    }

    public static function addFabricantByName(string $nomFabricant): int
    {
        $sql = "INSERT INTO fabricant(nom_fabricant) VALUES(:nom_fabricant);";
        $reponse = Dao::getConnexion()->prepare($sql);
        $result = $reponse->execute(array(":nom_fabricant" => $nomFabricant));
        // echo $result;
        // return "Bien ajoute le fabricant! ID:" . $fabricant->getId() . " Fabricant: " . $fabricant->getFabricant() . ".<br>\n";
        if ($result)
            return 1;
        else
            return 0;
    }


    public static function updateFabricant(Fabricant $fabricant): int
    {
        $sql = "UPDATE fabricant SET nom_fabricant=:nom_fabricant WHERE id_fabricant=:id_fabricant;";
        $reponse = Dao::getConnexion()->prepare($sql);
        $reponse->execute(array(":id_fabricant" => $fabricant->getId(), ":nom_fabricant" => $fabricant->getFabricant()));

        // echo "nbrep : " . $reponse->rowCount() . "<br>";
        // return "Bien modifie le fabricant! ID:" . $fabricant->getId() . " Fabricant: " . $fabricant->getFabricant() . ".<br>\n";
        if ($reponse->rowCount() == 0)
            return 0;
        return 1;
    }

    public static function deleteFabricant(Fabricant $fabricant): int
    {
        $sql = "DELETE FROM fabricant WHERE id_fabricant=:id_fabricant AND nom_fabricant=:nom_fabricant;";
        $reponse = Dao::getConnexion()->prepare($sql);
        $reponse->execute(array(":id_fabricant" => $fabricant->getId(), ":nom_fabricant" => $fabricant->getFabricant()));
        // return "Bien delete le fabricant! ID:" . $fabricant->getId() . " Fabricant: " . $fabricant->getFabricant() . ".<br>\n";
        if ($reponse->rowCount() == 0)
            return 0;
        return 1;
    }

    public static function deleteFabricantsById(array $ids): int
    {
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $sql = "DELETE FROM fabricant WHERE id_fabricant=:id_fabricant;";
                $reponse = Dao::getConnexion()->prepare($sql);
                $reponse->execute(array(":id_fabricant" => $id));
                $reponse->closeCursor();
            }
        }
        // return "Bien delete le fabricant! ID:" . $fabricant->getId() . " Fabricant: " . $fabricant->getFabricant() . ".<br>\n";
        if ($reponse->rowCount() == 0)
            return 0;
        return 1;
    }

    public static function getNBMarques1(string $fabricant_nom): int
    {
        $sql = "SELECT fctNBMarques (?) AS nbMarques";
        $reponse = Dao::getConnexion()->prepare($sql);
        try {
            $reponse->bindParam(1, $fabricant_nom);
            $reponse->execute();
            $nbMarque = $reponse->fetch()['nbMarques'];
            return $nbMarque;
        } catch (PDOException $e) {
            return 0;
        }

    }


    public static function getNBMarques2(string $fabricant_nom)
    {
        $db = Dao::getConnexion();
        
        $sql = "CALL prcNBMarques(?,@nbMarques)";
        $reponse = $db->prepare($sql);
        $reponse->bindValue(1, $fabricant_nom);
        $reponse->execute();
        $reponse->closeCursor();

        $sql2 = "SELECT @nbMarques";
        $reponse2 = $db->query($sql2);
        $nbMarque = $reponse2->fetch()['@nbMarques'];
        $reponse2->closeCursor();

        return $nbMarque;

        // $db = Dao::getConnexion();
        // $sql = 'CALL prcNBMarques(?, @nbMarques)';
        // $requete = $db->prepare($sql);

        // $requete->bindValue(1, $nom, PDO::PARAM_STR); // ou bindParam()
        // $requete->execute();

        // $requete->closeCursor();

        // $requete2 = $db->query('SELECT @nbMarques');

        // $nbmarques = $requete2->fetch()['@nbMarques'];

        // $requete2->closeCursor();

        // return $nbmarques;

    }
}
