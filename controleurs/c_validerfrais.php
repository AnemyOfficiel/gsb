<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];

switch($action) {
    case "validationFrais": {
        $visteurs = getAllVisiteurs();
        include("vues/v_validerfrais.php");
    }
}