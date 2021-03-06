<?= $header ?>
<?= $nav ?>
<div class="container">
    <form action="services/searchUserService.php" method="post" class="navbar-form inline-form">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Type</span>
                <select name="type" id="type" class="input-sm form-control" aria-describedby="basic-addon1">
                    <option value=""></option>
                    <?php
                        foreach($userType as $type){
                            ?>  
                                <option value="<?= $type->getId();?>"><?= $type->getNom();?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-user"></span>
                <input type="text" name="name" id="name" class="input-sm form-control" aria-describedby="basic-addon2" />
            </div>
            <input type="submit" value="Chercher" />
        </div>
    </form>
    <div>
        <?php
            if(!empty($user)){
        ?>
        <table class="table table-bordered table-striped">
            
            <tr>
                <td>ID</td>
                <td>PSEUDO</td>
                <td>EMAIL</td>
                <td>INSCRIPTION</td>
                <td>DERNIERE CONNECTION</td>
                <td>STATUT</td>
                <td>MODIFY STATUT</td>
            </tr>
            <?php
                foreach($user as $user){
                    ?>  
                    <tr>
                        <td><?=$user->getId();?></td>
                        <td><?=$user->getPseudo();?></td>
                        <td><?=$user->getEmail();?></td>
                        <td><?=$user->getInscription();?></td>
                        <td><?=$user->getConnexion();?></td>
                        <td><?=$user->getTypeId();?></td>
                        <td>
                            <form action="services/modifyTypeUserService.php" method="post">
                                <select name="typeName" id="typeName">
                                    <option value=""></option>
                                    <?php
                                        foreach($userType as $typeUser){
                                            ?>  
                                                <option value="<?= $typeUser->getId();?>"><?= $typeUser->getNom();?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <input class="hidden" type="number" name="id" id="id" value="<?=$user->getId();?>" />
                                <input type="submit" value="Envoyer" class="btn btn-default btn-xs" />
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }else{
            ?>
            <p>Recherche infructueuse, il n'y a rien a afficher !</p>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<?= $footer ?>