<?= $header ?>
<?= $nav ?>

<div class="container">
    <div class="row">
        <h2 class="text-center">Vos biens</h2>
        <p>
            <a href="formAddAnnonce" class="btn btn-default" >Ajouter une annonce</a>
        </p>
    </div>
    <div class="row">
        <?php foreach($annonce as $value){ ?>
            <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="detail/<?=$value["id"]?>">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active align-middle">
                                    <img class="img-rounded " alt="" src="<?php if(!empty($value["photos"][0]["photo_path"])){ echo $value["photos"][0]["photo_path"]; } ?>">
                                </div>
                                <?php 
                                foreach( $value["photos"] as $key => $val){
                                    if($key > 0){
                                ?>
                                    <div class="item align-middle">
                                        <img class="img-rounded " alt="<?= $val["titre"]?>" title ="<?= $val["titre"]?>" src="<?= $val["photo_path"]?>">
                                    </div>
                                <?php }
                                } 
                                ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12s">
                        <strong>A partir de <?=$value["tarif"]?></strong>
                        <br />
                        <span><?= $value["titre"] ?></span>
                    </div>
                </a>
            </p>
        <?php } ?>
    </div>
</div>

<?= $footer ?>