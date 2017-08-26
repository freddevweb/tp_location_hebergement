<?=$header?>
<?=$nav?>
<?php
// var_dump($annonce);
// die();
?>
<div class="container">
    <div class="row">
        <div class"row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-offset-2 col-xs-12" id="carrousselDetail">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active align-middle">
                            <img class="img-rounded " alt="<?= $annonce["photos"][0]["titre"]?>" title ="<?= $annonce["photos"][0]["titre"]?>" src="../<?= $annonce["photos"][0]["photo_path"] ?>" />
                            <h3 class="carousel-caption"><?= $annonce["photos"][0]["titre"]?></h3>
                        </div>
                        <?php 
                        foreach( $annonce["photos"] as $key => $val){
                            if($key > 0){
                        ?>
                            <div class="item align-middle">
                                <img class="img-rounded " alt="<?= $val["titre"]?>" title ="<?= $val["titre"]?>" src="../<?= $val["photo_path"]?>">
                                <h3 class="carousel-caption"><?= $val["titre"]?></h3>
                            </div>
                        <?php }
                        } 
                        ?>
                    </div>
                    <a class="left carousel-control" href="#carousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-nowrap">
            <h3 class="text-center"><strong><?= $annonce["titre"]?></strong></h3>
            <div class="row">
                <h4 class="text-center col-lg-5 col-md-5 col-sm-5 col-xs-12"><strong>A <?=$annonce["ville"]?></strong><h4>
                <h4 class="text-center col-lg-5 col-md-5 col-sm-5 col-xs-12"><strong>A partir de <?=$annonce["tarif"]?></strong><h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <p><?=$annonce["description"]; ?></p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1 col-xs-12 text-nowrap">
                <ul><strong>Equipements du logement :</strong>
                    <?php if($annonce["fumeur"] == 1 ){  ?>
                            <li>Fumeur</li>
                    <?php } ?>
                    <?php if($annonce["television"] == 1 ){  ?>
                            <li>television</li>
                    <?php } ?>
                    <?php if($annonce["chauffage"] == 1 ){  ?>
                            <li>chauffage</li>
                    <?php } ?>
                    <?php if($annonce["climatisation"] == 1 ){  ?>
                            <li>climatisation</li>
                    <?php } ?>
                    <?php if($annonce["sdb"] == 1 ){  ?>
                            <li>salle de bain</li>
                    <?php } ?>
                    <?php if($annonce["parking"] == 1 ){  ?>
                            <li>parking</li>
                    <?php } ?>
                    <?php if($annonce["laveLinge"] == 1 ){  ?>
                            <li>laveLinge</li>
                    <?php } ?>
                    <?php if($annonce["wifi"] == 1 ){  ?>
                            <li>wifi</li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <ul>
                    <li>Nombre de pièce : <?=$annonce["nbrePieces"] ; ?></li>
                    <li>Nombre de chambre : <?=$annonce["nbreChambre"]; ?></li>
                    <li>Surface : <?=$annonce["surface"]; ?>m²</li>
                    
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <ul>
                    <li>Arrivée entre <?=$annonce["arriveeDebut"]; ?> et <?=$annonce["arriveeFin"]; ?>.</li>
                    <li>Heure de départ maximum <?=$annonce["hDepart"]; ?>.</li>
                    <li>Capacité maximum d'hébergement : <?=$annonce["capacite"]; ?> personnes</li>
                </ul>
            </div>
            <?php if($annonce["user_id"] == $_SESSION["id"]){?>
                <p>
                     <form action="../services/saveAnnonceService.php" method="post">
                        <div class="hidden">
                            <input type="number" name ="id" value="<?=$annonce["id"] ; ?>">
                            <input type="text" name ="adress" value="<?=$annonce["adress"] ; ?>">
                            <input type="text" name ="cp" value="<?=$annonce["codePostal"] ; ?>">
                            <input type="text" name ="ville" value="<?=$annonce["ville"] ; ?>" />
                            <input type="radio" name="type" value="1" <?php if($annonce["type_logement_id"] == 1){?>checked <?php } ?> />
                            <input type="radio" name="type" value="2" <?php if($annonce["type_logement_id"] == 2){?>checked <?php } ?> />
                            <input type="radio" name="type" value="3" <?php if($annonce["type_logement_id"] == 3){?>checked <?php } ?> />
                            <input type="radio" name="type" value="4" <?php if($annonce["type_logement_id"] == 4){?>checked <?php } ?> />
                            <input type="radio" name="type" value="5" <?php if($annonce["type_logement_id"] == 5){?>checked <?php } ?> />
                            <input type="checkbox" name="fumeur" value="TRUE" <?php if($annonce["fumeur"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="television" value="TRUE" <?php if($annonce["television"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="chaufage" value="TRUE" <?php if($annonce["chauffage"] == 1){ ?>checked <?php } ?> />
                            <input type="checkbox" name="climatisation" value="TRUE" <?php if( $annonce["climatisation"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="sdb" value="TRUE" <?php if( $annonce["sdb"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="parking" value="TRUE" <?php if( $annonce["parking"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="laveLinge" value="TRUE"  <?php if( $annonce["laveLinge"] == 1){?>checked <?php } ?> />
                            <input type="checkbox" name="wifi" value="TRUE" <?php if( $annonce["wifi"]  == 1){?>checked <?php } ?> />
                            <input type="text" name ="titre" value="<?=$annonce["titre"] ; ?>">
                            <textarea name ="description"><?=$annonce["description"] ; ?></textarea>
                            <input type="text" name ="surface" value="<?=$annonce["surface"] ; ?>">
                            <input type="number" name ="pieces" value="<?=$annonce["nbrePieces"] ; ?>">
                            <input type="number" name ="chambre" value="<?=$annonce["nbreChambre"] ; ?>">
                            <input type="number" name ="capacite" value="<?=$annonce["capacite"] ; ?>">
                            <input type="time" name ="heureCleMin" value="<?=$annonce["arriveeDebut"] ; ?>">
                            <input type="time" name ="heureCleMax" value="<?=$annonce["arriveeFin"] ; ?>">
                            <input type="time" name ="depart" value="<?=$annonce["hDepart"] ; ?>">
                            <input type="number" name ="tarif" value="<?=$annonce["tarif"] ; ?>">
                            <input type="text" name ="from" value="modify">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <input type="submit" value="Modifier l'annonce" class="btn btn-default" />
                        </div>
                    </form> 
                </p>
            <?php } else { ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <button type="button" data-toggle="modal" data-target="#reservation" class="btn btn-inverse navbar-btn btn-sm">Réserver</button>
            </div>
            <div class="modal fade" id="reservation">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2>Réserver</h2>
                        </div>
                        <div class="modal-body">
                            <blockquote>
                                <form action="services/reserverService.php" method="POST">
                                    <!-- dates souhaitées -->
                                    <div class="hidden">
                                        <input type="text" name="quoi" value="<?= $annonce["id"];?> "/>
                                    </div>
                                    <div class="form-group">
                                        <label for="arrivee">Date d'arrivée</label>
                                        <input type="date" class="form-control" name ="arrivee" id="arrivee">
                                    </div>
                                    <div class="form-group">
                                        <label for="depart">Date de départ</label>
                                        <input type="date" class="form-control" name="depart" id="depart">
                                    </div>
                                    <!-- texte d'accompagnement -->

                                    <button type="submit" class="btn btn-default">Envoyer</button>
                                </form>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <?php } var_dump($_SESSION); ?>
            


        </div>
    </div>
</div>

<?=$footer?>