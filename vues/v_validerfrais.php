<?php if ($_GET["action"] != "selectionnerMois") { ?>
    <?php if($etat) { ?>
    <div class="corpsform">
        <fieldset>
            <legend>Fiche de frais du mois <?= $numMois_visiteur ?>/<?= $numAnnee_visiteur ?></legend>

            <p>Etat : <?= $etat["libelle"] ?> depuis le <?= $date_fiche ?> <br> Montant validé : <?= $etat["montant"] ?></p>

            <table class="listeLegere" style="width: 100%;">
                <h3>Eléments forfatisés</h3>
                <tr>
                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $libelle = $unFraisForfait['libelle'];
                    ?>
                        <th><?= $libelle ?></th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php
                    foreach ($lesFraisForfait as $unFraisForfait) {
                        $quantite = $unFraisForfait['quantite'];
                    ?>
                        <td><input type="text" name="lesFrais[<?= $unFraisForfait["idfrais"] ?>]" value="<?= $quantite ?>" style="width: 93px;"></td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <div class="piedForm" style="width: 100%;border: 0;">
                <p>
                    <input id="ok" type="submit" name="validerfrais" value="Valider" size="20">
                    <input id="annuler" type="reset" value="Effacer" size="20">
                </p>
            </div>
            <table class="listeLegere" style="width: 100%;border: 0;">
                <caption>Descriptif des éléments hors forfait - <input type="text" name="justificatifs" value="<?= $etat["nbJ"] ?>"> justificatifs reçus -
                </caption>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class='montant'>Montant</th>
                    <th class="action" colspan="2">Action</th>
                </tr>
                
                <?php foreach($lesFraisHorsForfait as $unFraisHorsForfait) { ?>
                <tr <?php if($unFraisHorsForfait["suppr"]) { ?>style="background-color: #f43535;" <?php } ?>>
                    <td><?= $unFraisHorsForfait["date"] ?></td>
                    <td><?php if($unFraisHorsForfait["suppr"]) { ?>REFUSE : <?php } ?><?= $unFraisHorsForfait["libelle"] ?></td>
                    <td><?= $unFraisHorsForfait["montant"] ?></td>
                    <?php if(!$unFraisHorsForfait["suppr"]) { ?>
                        <?php if(isset($_GET["mois"]) AND isset($_GET["visiteur"])) { 
                            $_POST["mois"] = $_GET["mois"];
                            $_POST["visiteur"] = $_GET["visiteur"];
                        ?>
                            <?php } ?>
                    <td><a href="index.php?uc=validerfrais&action=supprimerHorsForfait&idFrais=<?= $unFraisHorsForfait["id"] ?>&visiteur=<?= $_POST["visiteur"] ?>&mois=<?= $_POST["mois"] ?>">Supprimer</a></td>
                    <td><a href="index.php?uc=validerfrais&action=reporterHorsForfait&idFrais=<?= $unFraisHorsForfait["id"] ?>&visiteur=<?= $_POST["visiteur"] ?>&mois=<?= $_POST["mois"] ?>">Reporter</a></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </fieldset>
    </div>
<?php } else { ?>
    <div class="erreur">
        <p>Cette fiche n'existe pas pour ce visiteur et pour ce mois</p>
    </div>
<?php } ?>
<?php } ?>
</div>