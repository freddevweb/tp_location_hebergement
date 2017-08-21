<?= $header ?>
<?= $nav ?>
<?php
var_dump($data);
?>
<div class="container">
    <h3 class="text-center">Ajouter ou modifier un bien</h3>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-lg-12 col-lg-12">
            <table class="red">
            
                <?php   foreach( $error as $value){  ?>
                    <tr class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><td><?= $value ?></td></tr>
                <?php   }    ?>
            </table>
            <table class="orange">
                <?php   foreach( $conseil as $value){  ?>
                    <tr class=" col-lg-6 col-md-6 col-sm-12 col-xs-12"><td><?= $value ?></td></tr>
                <?php  }    ?>
            </table>
        </div>
    </div>
    <form action="services/saveAnnonceService.php" method="POST">
        <!-- adresse -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
                <p>Coordonnees du logement</p>
                <div class="form-group">
                    <label for="adress">Adresse</label>
                    <input type="text" class="form-control" name ="adress" id="adress" placeholder="L'adresse de votre bien" value="<?= $data->getAdress() ?>">
                </div>
                <div class="form-group">
                    <label for="cp">Code postas</label>
                    <input type="text" class="form-control" name ="cp" id="cp" placeholder="Code postal de votre bien" value="<?= $data->getCodePostal() ?>">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name ="ville" id="ville" placeholder="Ville de votre bien" value="<?= $data->getVille() ?>" />
                </div>
            </div >
            <!-- type  -->
            <div class="col-lg-3 col-md-3 col-sm-6-col-xs-6">
                <div class="form-group">
                    <p>Type de logement</p>
                    <div class="radio">
                        <label for="chambre" class="radio">
                            <input type="radio" name="type" value="chambre" id="chambre" <?php if($data->getTypeLogementId() == "chambre"){?>checked <?php } ?> />
                            Chambre 
                        </label>
                    </div>
                    <div class="radio">
                        <label for="dépendance" class="radio">
                            <input type="radio" name="type" value="dependance" id="dependance" <?php if($data->getTypeLogementId() == "dependance"){?>checked <?php } ?> />
                            Dépendance
                        </label>
                    </div>
                    <div class="radio">
                        <label for="studio" class="radio">
                            <input type="radio" name="type" value="studio" id="studio" <?php if($data->getTypeLogementId() == "studio"){?>checked <?php } ?> />
                            Studio 
                        </label>
                    </div>
                    <div class="radio">
                        <label for="appartement" class="radio">
                            <input type="radio" name="type" value="appartement" id="appartement" <?php if($data->getTypeLogementId() == "appartement"){?>checked <?php } ?> />
                            Appartement
                        </label>
                    </div>
                    <div class="radio">
                        <label for="maison_village" class="radio">
                            <input type="radio" name="type" value="maison_village" id="maison_village" <?php if($data->getTypeLogementId() == "maison_village"){?>checked <?php } ?> >
                            Maison de village
                        </label>
                    </div>
                    <div class="radio">
                        <label for="villa" class="radio">
                            <input type="radio" name="type" value="villa" id="villa" <?php if($data->getTypeLogementId() == "villa"){?>checked <?php } ?> />
                            Villa
                        </label>
                    </div>
                </div>
            </div>
            <!-- contenu -->
            <div class="col-lg-3 col-md-3 col-sm-6-col-xs-6">
                <div class="form-group">
                    <p>Equipements du logement</p>
                    <div class="checkbox ">
                        <label for="fumeur" class="checkbox">
                            <input type="checkbox" name="fumeur" value="fumeur" id="fumeur" <?php if($data->getFumeur() == "fumeur"){?>checked <?php } ?> />
                            Fumeur
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="television" class="checkbox">
                            <input type="checkbox" name="television" value="television" id="television" <?php if($data->getTelevision() == "television"){?>checked <?php } ?> />
                            Television
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="chaufage" class="checkbox">
                            <input type="checkbox" name="chaufage" value="chaufage" id="chaufage" <?php if($data->getChauffage() == "chaufage"){ ?>checked <?php } ?> />
                            Chaufage
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="climatisation" class="checkbox">
                            <input type="checkbox" name="climatisation" value="climatisation" id="climatisation" <?php if($data->getClimatisation() == "climatisation"){?>checked <?php } ?> />
                            Climatisation
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="sdb" class="checkbox">
                            <input type="checkbox" name="sdb" value="sdb" id="sdb" <?php if($data->getSdb() == "sdb"){?>checked <?php } ?> />
                            Salle de bain
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="villa" class="checkbox">
                            <input type="checkbox" name="parking" value="parking" id="parking" <?php if($data->getParking() == "parking"){?>checked <?php } ?> />
                            Parking
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="laveLinge" class="checkbox">
                            <input type="checkbox" name="laveLinge" value="laveLinge" id="laveLinge" <?php if($data->getLaveLinge() == "laveLinge"){?>checked <?php } ?> />
                            LaveLinge
                        </label>
                    </div>
                    <div class="checkbox ">
                        <label for="wifi" class="checkbox">
                            <input type="checkbox" name="wifi" value="1" id="wifi" <?php if($data->getWifi() == "wifi"){?>checked <?php } ?> />
                            wifi
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- definition -->
            <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name ="titre" id="titre" placeholder="Titre de votre annonce" value="<?= $data->getTitre() ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name ="description" id="description" placeholder="Description de votre bien" value="<?= $data->getDescription() ?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="surface">Surface</label>
                    <input type="text" class="form-control" name ="surface" id="surface" value="<?= $data->getSurface() ?>">
                </div>
                <div class="form-group">
                    <label for="pieces">Nombre de pièces</label>
                    <input type="number" class="form-control" name ="pieces" id="pieces" value="<?= $data->getNbrePieces() ?>">

                </div>
                <div class="form-group">
                    <label for="titre">Nombre de chambres</label>
                    <input type="number" class="form-control" name ="chambre" id="titre" value="<?= $data->getNbreChambre() ?>">
                </div>
                <div class="form-group">
                    <label for="capacite">Capacité d'hébergement</label>
                    <input type="number" class="form-control" name ="capacite" id="capacite" value="<?= $data->getCapacite() ?>">
                </div>
                
            </div>
            <!-- conditions -->
            <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
                <p>Créneau horaire de récupération des clés</p>
                <div class="form-group">
                    <label for="heureCleMin">Créneau horaire de récupération des clés: partir de :</label>
                    <input type="time" class="form-control" name ="heureCleMin" id="heureCleMin" value="<?= $data->getArriveeDebut() ?>">
                </div>
                <div class="form-group">
                    <label for="heureCleMax">Créneau horaire de récupération des clés: jusqu'à :</label>
                    <input type="time" class="form-control" name ="heureCleMax" id="heureCleMax" value="<?= $data->getArriveeFin() ?>">
                </div>
                <div class="form-group">
                    <label for="depart">Heure de départ maximum en fin de location : </label>
                    <input type="time" class="form-control" name ="depart" id="depart" value="<?= $data->getHDepart() ?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
                <div class="form-group">
                    <label for="tarif">Tarif par nuitée</label>
                    <input type="number" class="form-control" name ="tarif" id="tarif" value="<?= $data->getTarif() ?>">
                </div>
            </div>
        </div> 
        <div class="col-lg-12 col-md-12 col-sm-12-col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Suivant ></button>
                <a href="">
                    <button class="btn btn-default">Effacer le formulaire</button>
                </a>
                <a href="">
                    <button class="btn btn-default">Retour au tableau de bord</button>
                </a>
            </div>
        </div>
    </form>
</div>
<?= $footer ?>