<?php

// require_once "classes/FabricantsMGR.class.php";
// require_once "classes/Fabricant.class.php";

spl_autoload_register(function ($class) {
    include_once "classes/$class.class.php";
});

const RC = "<br>\n";


try {

    // o getListFabricants()
    echo "<h1>Liste de Fabricants CLASS</h1>";
    foreach (FabricantsMGR::getListFabricants() as $index => $fabricant) {
        if ($index == 0)
            echo "<table><tbody>\n<tr><th>Id</th><th>Fabricant</th></tr>\n";
        echo "<tr><td style='text-align: center;'>" . $fabricant->affichage()[0] . "</td>" . "<td style='text-align: center;'>" . $fabricant->affichage()[1] . "</td></tr>\n";
    }
    echo "</tbody></table>";
    echo RC . "Combien Fabricant: " . Fabricant::$counter . RC;

    // echo FabricantsMGR::addFabricant(new Fabricant(10,"Heinz Ultra"));
    // echo "Le fabricant a ete ajoute! " . FabricantsMGR::addFabricantByName(1886);
    // echo "Le fabricant a ete modifie! " . FabricantsMGR::updateFabricant(new Fabricant(11, "Toto"));
    // echo "Le fabricant a ete supprime! " . FabricantsMGR::deleteFabricant(new Fabricant(25, "1886"));
    // echo "Les fabricants ont ete supprime! " . FabricantsMGR::deleteFabricantsById([30]);

    // // o getFabricantById()
    // echo "<h1>Liste de Fabricants by ID</h1>";
    // echo getFabricantById(3)["id_fabricant"] . " " . getFabricantById(3)["nom_fabricant"] . RC;
    // echo getFabricantById(4)["id_fabricant"] . " " . getFabricantById(4)["nom_fabricant"] . RC;
    // echo getFabricantById(6)["id_fabricant"] . " " . getFabricantById(6)["nom_fabricant"] . RC;

    // // o getFabricantByName()
    // echo "<h1>Liste de Fabricants by NAME</h1>";
    // foreach (getFabricantByName("Pa") as $fabricant) {
    //     echo $fabricant["id_fabricant"] . " " . $fabricant["nom_fabricant"];
    //     echo RC;
    // }
    // echo "<hr>";
    // foreach (getFabricantByName("Hein") as $fabricant) {
    //     echo $fabricant["id_fabricant"] . " " . $fabricant["nom_fabricant"];
    //     echo RC;
    // }

    echo "Nombre de marques(fctNBMarques) en Fabricant AB InBev = " . FabricantsMGR::getNBMarques1("AB InBev") . RC;
    echo "Nombre de marques(prcNBMarques) en Fabricant Diageo = " . FabricantsMGR::getNBMarques2("Diageo") . RC;


} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
