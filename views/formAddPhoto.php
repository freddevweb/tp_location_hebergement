<?= $header ?>
<?= $nav ?>
<div class="container">
    <h3>Ajouter des photos</h3>

<!-- photo -->
    <form action="services/addPhoto.php" method="post">
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="presentation">Photo de présentation :</label>
                <input type="file" class="form-control" name ="tarif" id="presentation">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="photo1">Photo 1 :</label>
                <input type="file" class="form-control" name ="tarif" id="photo1">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12-col-xs-12">
            <div class="form-group">
                <label for="photo2">Photo 2 :</label>
                <input type="number" class="form-control" name ="photo2" id="photo2">
            </div>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12-col-xs-12">
    </form>
</div>
<?= $footer ?>