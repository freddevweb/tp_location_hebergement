<?= $header ?>
<?= $nav ?>
<div class="container">
    <h3>Ajouter ou modifier des photos</h3>

<!-- photo -->
    <form action="services/savePhotoService.php" method="post">
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div>
                <img src="<?= var_dump("presentation") ;?>"/>
            </div>
            <div class="form-group">
                <label for="presentation">Photo de présentation :</label>
                <input type="file" class="form-control" name ="presentation" id="presentation">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div>
                <img src="<?= var_dump("photo1") ;?>"/>
            </div>
            <div class="form-group">
                <label for="photo1">Photo 1 :</label>
                <input type="file" class="form-control" name ="photo1" id="photo1">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div>
                <img src="<?= var_dump("photo2") ;?>"/>
            </div>
            <div class="form-group">
                <label for="photo2">Photo 2 :</label>
                <input type="file" class="form-control" name ="photo2" id="photo2">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
            <input type="submit" value="envoyer" />
        </div>
    </form>
</div>
<?= $footer ?>