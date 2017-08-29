<?php
// var_dump($type);
// var_dump(!empty($dataForm["type"]));
// die();
?>
<div class="col-lg-10 col-offset-2">
    <form action="annoncesAll" method="post">
        <div class="form-group row">
            <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville :" value="<?php if(!empty($dataForm["ville"])){echo $dataForm["ville"];} ?>" />
        </div>
        <div class="form-group row">
            <select name="type" class="form-control selectpicker">
                <option>Type de logement :</option>
                <?php if(!empty($type) ){
                    foreach($type as $value){ ?>
                <option value="<?= $value->getId();?>"<?php if(!empty($dataForm["type"]) && $dataForm["type"] == $value->getId() ){echo "selected";} ?> ><?=$value->getNom()?></option>
                <?php }
                }?>
            </select>
        </div>
        <div class="form-group row">
            <label for="arrivee">Arrivée :</label>
            <input class="form-control" type="date" id="arrivee" name="arrivee" placeholder="Date d'" value="<?php if(!empty($dataForm["arrivee"])){echo $dataForm["arrivee"];} ?>"/>
        </div>
        <div class="form-group row">
            <label for="depart">Départ :</label>
            <input class="form-control" type="date" id="arrivee" name="depart" value="<?php if(!empty($dataForm["depart"])){echo $dataForm["depart"];} ?>"/>
        </div>
        <div class="form-group  row">
            <p>Equipements recherchés: </p>
            <div class="checkbox ">
                <label for="fumeur" class="checkbox">
                    &nbsp;&nbsp;
                    <input class="btn btn-default" type="checkbox" name="fumeur" value="TRUE" id="fumeur" <?php if(!empty($dataForm["fumeur"]) == true){echo "checked";} ?> />
                    Fumeur
                </label>
            </div>
            <div class="checkbox ">
                <label for="television" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="television" value="TRUE" id="television" <?php if(!empty($dataForm["television"]) == true){echo "checked";} ?> />
                    Television
                </label>
            </div>
            <div class="checkbox ">
                <label for="chaufage" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="chaufage" value="TRUE" id="chaufage" <?php if(!empty($dataForm["chaufage"]) == true){echo "checked";} ?> />
                    Chaufage
                </label>
            </div>
            <div class="checkbox ">
                <label for="climatisation" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="climatisation" value="TRUE" id="climatisation" <?php if(!empty($dataForm["climatisation"]) == true){echo "checked";} ?> />
                    Climatisation
                </label>
            </div>
            <div class="checkbox ">
                <label for="sdb" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="sdb" value="TRUE" id="sdb" <?php if(!empty($dataForm["sdb"]) == true){echo "checked";} ?> />
                    Salle de bain
                </label>
            </div>
            <div class="checkbox ">
                <label for="villa" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="parking" value="TRUE" id="parking" <?php if(!empty($dataForm["parking"]) == true){echo "checked";} ?> />
                    Parking
                </label>
            </div>
            <div class="checkbox ">
                <label for="laveLinge" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="laveLinge" value="TRUE" id="laveLinge" <?php if(!empty($dataForm["laveLinge"]) == true){echo "checked";} ?> />
                    LaveLinge
                </label>
            </div>
            <div class="checkbox ">
                <label for="wifi" class="checkbox">
                    &nbsp;&nbsp;
                    <input type="checkbox" name="wifi" value="TRUE" id="wifi" <?php if(!empty($dataForm["wifi"]) == true){echo "checked";} ?> />
                    wifi
                </label>
            </div>
        </div>
        <div class="form-group row">
            <select name="classement" class="form-control selectpicker">
                <option value=""><strong>Trier par :<strong></option>
                <optgroup label="Prix">
                    <option value="pc" <?php if(!empty($dataForm["classement"]) && $dataForm["classement"] == "pc"){echo "selected";} ?> >Croissant</option>
                    <option value="pd" <?php if(!empty($dataForm["classement"]) && $dataForm["classement"] == "pd"){echo "selected";} ?> >Decroissant</option>
                </optgroup>
                <optgroup label="Favoris">
                    <option value="fc" <?php if(!empty($dataForm["classement"]) && $dataForm["classement"] == "fc"){echo "selected";} ?> ?> >Croissant</option>
                    <option value="fd" <?php if(!empty($dataForm["classement"]) && $dataForm["classement"] == "fd"){echo "selected";} ?> >Decroissant</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group  row">
            <input type="submit" name="reset" class="btn btn-default form-control" value="effacer" />
            <input type="submit" name="submit" class="btn btn-default form-control" value="Chercher"/>
        </div>
    </form>
</div>