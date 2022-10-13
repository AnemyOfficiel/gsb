<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case "selectionnerMois": {
            $visiteursetmois = $pdo->getVisiteursAndMoisVA();

            
            include("vues/v_listeMoisSuivi.php");
            break;
        }
}
