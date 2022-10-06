<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch ($action) {
    case "selectionnerMois": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();

            include("vues/v_listeMoisValiderFrais.php");
            break;
        }
    case "validationFrais": {
            $visiteurs = $pdo->getAllVisiteurs();
            $mois = $pdo->getAllMoisIsset();
            $mois_visiteur = $_POST["mois"];

            var_dump($_REQUEST);
            var_dump($_POST);

            $etat = $pdo->getEtatFicheUtilisateur($_POST["visiteur"], $mois_visiteur);

            if ($etat) {
                $date_fiche = dateAnglaisVersFrancais($etat["datefiche"]);

                $numAnnee_visiteur = substr($mois_visiteur, 0, 4);
                $numMois_visiteur = substr($mois_visiteur, 4, 2);

                $lesFraisForfait= $pdo->getLesFraisForfait($_POST["visiteur"],$mois_visiteur);

                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_POST["visiteur"],$mois_visiteur);

                $infos_visiteur = $pdo->getInfosUtilisateurByID($_POST["visiteur"]);
            }
            include("vues/v_listeMoisValiderFrais.php");
            include("vues/v_validerfrais.php");
        }
}
