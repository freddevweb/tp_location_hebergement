<?= $header ?>
<?= $nav ?>
<div class="container">
    <form action="services/saveAnnonceService.php" method="POST">
        <!-- adresse -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <p>Coordonnees du logement</p>
            <div class="form-group">
                <label for="adress">Adresse</label>
                <input type="text" class="form-control" name ="adress" id="adress" placeholder="L'adresse de votre bien">
            </div>
            <div class="form-group">
                <label for="cp">Code postas</label>
                <input type="text" class="form-control" name ="cp" id="cp" placeholder="Code postal de votre bien">
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" name ="ville" id="ville" placeholder="Ville de votre bien">
            </div>
        </div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
        <!-- type  -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <div class="form-group">
                <p>Type de logement</p>
                <div class="radio">
                    <label for="chambre" class="radio">
                        <input type="radio" name="type" value="chambre" id="chambre">
                        Chambre 
                    </label>
                </div>
                <div class="radio">
                    <label for="dépendance" class="radio">
                        <input type="radio" name="type" value="dépendance" id="dépendance">
                        Dépendance
                    </label>
                </div>
                <div class="radio">
                    <label for="studio" class="radio">
                        <input type="radio" name="type" value="studio" id="studio">
                        Studio 
                    </label>
                </div>
                <div class="radio">
                    <label for="appartement" class="radio">
                        <input type="radio" name="type" value="appartement" id="appartement">
                        Appartement
                    </label>
                </div>
                <div class="radio">
                    <label for="maison_village" class="radio">
                        <input type="radio" name="type" value="maison_village" id="maison_village">
                        Maison de village
                    </label>
                </div>
                <div class="radio">
                    <label for="villa" class="radio">
                        <input type="radio" name="type" value="villa" id="villa">
                        Villa
                    </label>
                </div>
            </div>
        </div>
        <!-- contenu -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <div class="form-group">
                <p>Equipements du logement</p>
                <div class="checkbox ">
                    <label for="television" class="checkbox">
                        <input type="checkbox" name="television" value="television" id="television">
                        Television
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="chaufage" class="checkbox">
                        <input type="checkbox" name="chaufage" value="chaufage" id="chaufage">
                        Chaufage
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="climatisation" class="checkbox">
                        <input type="checkbox" name="climatisation" value="climatisation" id="climatisation">
                        Climatisation
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="sdb" class="checkbox">
                        <input type="checkbox" name="sdb" value="sdb" id="sdb">
                        Salle de bain
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="villa" class="checkbox">
                        <input type="checkbox" name="parking" value="parking" id="parking">
                        Parking
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="laveLinge" class="checkbox">
                        <input type="checkbox" name="laveLinge" value="laveLinge" id="laveLinge">
                        LaveLinge
                    </label>
                </div>
                <div class="checkbox ">
                    <label for="wifi" class="checkbox">
                        <input type="checkbox" name="wifi" value="1" id="wifi">
                        wifi
                    </label>
                </div>
            </div>
        </div>
        <!-- conditions -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <p>Créneau horaire de récupération des clés</p>
            <div class="form-group">
                <label for="heureCleMin">Créneau horaire de récupération des clés: partir de :</label>
                <input type="time" class="form-control" name ="heureCleMin" id="heureCleMin">
            </div>
            <div class="form-group">
                <label for="heureCleMax">Créneau horaire de récupération des clés: jusqu'à :</label>
                <input type="time" class="form-control" name ="heureCleMax" id="heureCleMax">
            </div>
            <div class="form-group">
                <label for="heureCleMax">Heure de départ maximum en fin de location : </label>
                <input type="time" class="form-control" name ="heureCleMax" id="heureCleMax">
            </div>
        </div>
        <!-- definition -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name ="titre" id="titre" placeholder="Titre de votre annonce">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name ="description" id="description" placeholder="Description de votre bien"></textarea>
            </div>
            <div class="form-group">
                <label for="surface">Surface</label>
                <input type="text" class="form-control" name ="surface" id="surface">
            </div>
            <div class="form-group">
                <label for="pieces">Nombre de pièces</label>
                <input type="number" class="form-control" name ="pieces" id="pieces">

            </div>
            <div class="form-group">
                <label for="titre">Nombre de chambres</label>
                <input type="number" class="form-control" name ="titre" id="titre">
            </div>
            <div class="form-group">
                <label for="capacite">Capacité d'hébergement</label>
                <input type="number" class="form-control" name ="capacite" id="capacite">
            </div>
            
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="tarif">Tarif par nuitée</label>
                <input type="number" class="form-control" name ="tarif" id="tarif">
            </div>
        </div>
        <!-- photo -->
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="presentation">Photo de présentation :</label>
                <input type="file" class="form-control" name ="tarif" id="presentation">
            </div>
            <div class="form-group">
                <label for="photo1">Photo 1 :</label>
                <input type="file" class="form-control" name ="tarif" id="photo1">
            </div>
            <div class="form-group">
                <label for="photo2">Photo 2 :</label>
                <input type="number" class="form-control" name ="photo2" id="photo2">
            </div>
        </div> 
        <button type="submit" class="btn btn-default">Envoyer</button>
        <a href="">
            <button class="btn btn-default">Effacer le formulaire</button>
        </a>
        <a href="">
            <button class="btn btn-default">Retour au tableau de bord</button>
        </a>
    </form>
</div>
<?= $footer ?>