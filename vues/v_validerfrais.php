<div id="contenu">
    <h2>Validation des fiches de frais</h2>
    <div class="corpsform">
        <fieldset>
            <legend>Visiteur et mois à sélectionner</legend>
            <p>
        <label for="lstvisiteur" accesskey="n">Visiteur : </label>
        <select id="lstvisiteur" name="lstvisiteur">
            <?php foreach($visiteurs as $v) { ?>
            <option value="202209">09/2022 </option>
            <?php } ?>
        </select><br>
        
      </p>
      <p>
        <label for="lstMois" accesskey="n">Mois : </label>
        <select id="lstMois" name="lstMois">
            <option selected="" value="202209">09/2022 </option>
            <option value="202112">12/2021 </option>
        </select>
</p>
        </fieldset>
    </div>
</div>