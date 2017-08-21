<?= $header ?>
<?= $nav ?>

<div class="container">
    <div class="jumbotron text-center">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <h2>Profil</h2>
                <table id="profilTable">
                    <tr>
                        <td><h4>Utilisateur : </h4></td>
                        <td><h4><?=$user->getPseudo();?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Email : </h4></td>
                        <td><h4><?=$user->getEmail();?></h4></td>
                    </tr>
                    <tr>
                        <td><h4>Password : </h4></td>
                        <td><h4>*****************</h4></td>
                    </tr>
                    <tr>
                        <td><h4>Date d'inscription : </h4></td>
                        <td><h4><?=$user->getInscription();?></h4></td>
                    </tr>
                </table>
                <h4>Vous êtes actuellement <?= $type->getNom(); ?></h4>
                
                <?php
                    if($user->getTypeId() == 4){
                        ?>
                            <p><button class="btn btn-default btn-lg"><strong>Souhaitez vous devenir hote</strong></button></p>
                        <?php
                    }
                ?>
                <p><a href="" type="button" data-toggle="modal" data-target="#modifyUser" class="btn btn-inverse navbar-btn btn-sm">Modifier vos informations personnelles</a></p>
            </div>
        </div>
        
    </div>
    
</div>
<?php
require "modalFormModifUser.php";
?>
<?= $footer ?>