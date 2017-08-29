<?= $header;?>
<?= $nav;?>
<?php
// var_dump($annonce); 
// var_dump($type);
// var_dump($dataForm);
// die();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
            <div class="row"><p>&nbsp;</p><p>&nbsp;</p></div>
            <?php include "views/formSearchAnnonce.php"; ?>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
            <?php if(is_string($annonce)){ ?>
                <div class="jumbotron alert">
                    <h2 class="alert"><?=$annonce ?></h2>
                </div>
            <?php } else {?>
                <?php foreach($annonce as $value){  ?>
                    <a href="detail/<?=$value["id"]?>">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="item active align-middle">
                                        <img class="img-rounded " alt="" src="<?php if( !empty($value["photos"][0]["photo_path"]) ) echo $value["photos"][0]["photo_path"] ?>">
                                    </div>
                                    <?php 
                                    foreach( $value["photos"] as $key => $val){
                                        if($key > 0){ 
                                    ?>
                                        <div class="item align-middle">
                                            <img class="img-rounded " alt="<?= $val["titre"]?>" title ="<?= $val["titre"]?>" src="<?php if( !empty($val["photo_path"]) ) echo $val["photo_path"] ?>">
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-nowrap">
                                <strong>A partir de <?=$value["tarif"]?></strong>
                                <br />
                                <span><?= substr($value["titre"], 0, 30)."..." ?></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-nowrap">
                                <span><?= $value["count"] ?> favoris</span>
                                <span><?= $value["count"]?>Commentaires</span><!-- modifier count pour ajouter ne nombre de commentaires -->
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>


<?= $footer;?>