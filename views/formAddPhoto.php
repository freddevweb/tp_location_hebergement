<?= $header ?>
<?= $nav ?>
<?php
var_dump($msg);
// die();
?>
<div class="container">
    
    <div class="row">
        <h3 class="text-center">Ajouter ou modifier des photos</h3>

        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-lg-12 col-lg-12">
            <?php if(!empty($conseil)){  ?>
            <table class="red">
                <?php foreach( $conseil as $value){  ?>
                    <tr class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><td><?= $value ?></td></tr>
                <?php   }    ?>
            </table>
            <?php } ?>
            <?php if(!empty($msg)){  ?>
            <table class="success">
                    <tr class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><td><?= $msg ?></td></tr>
            </table>
            <?php } ?>
        </div>
        <!-- photo -->
        <form enctype="multipart/form-data" action="services/savePhotoService.php" method="post" class="col-lg-4 col-ld-4 col-sm-12 col-xs-12">

            <select id="phototype" class="form-group form-control" name="type">
                <!-- REMPLIR LES OPTIONS AVEC LA TABLE PHOTO TYPE EN FONCTION DES PHOTOS LIBRES-->
                <option value="">Sélectionner le type de la photo</option>
                <option value="1">Photo de présentation</option>
                <option value="2">Photo 1</option>
                <option value="3">Photo 2</option>
                <option value="4">Photo 3</option>
                <option value="5">Photo 4</option>
                <option value="6">Photo 5</option>
                <option value="7">Photo 6</option>
            </select>
            <input type="text" class=" form-group form-control" name ="titre" id="titre" placeholder='Titre de votre photo : "chambre"'>
            <!-- on change -> requette ajax pour voir la photo si la photo est déjà presente -->
            <input type="file" class=" form-group form-control" name ="uploadedfile" id="uploadedfile">

            <input class="form-group form-control" type="submit" value="envoyer" />
            <a href=""><button class="form-group form-control"/>Retour à l'annonce</button></a>

        </form>
        <div class="col-lg-8 col-ld-8 col-sm-12 col-xs-12">
            <img src="#"/>
        </div>
    </div>
</div>
<?= $footer ?>