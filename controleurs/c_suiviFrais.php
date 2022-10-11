<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case "selectionnerMois": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();

            

            include("vues/v_listeMoisSuivi.php");
            break;
        }
}
