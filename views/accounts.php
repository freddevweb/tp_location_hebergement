<?= $header ?>
<?= $nav ?>
<?php
var_dump($user);
var_dump($userType);
?>
<div class="container">
    <form action="services/searchUserService.php" method="post" class="navbar-form inline-form">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Type</span>
                <select name="type" id="type" class="input-sm form-control" aria-describedby="basic-addon1">
                    <option value=""></option>
                    <?php
                        foreach($userType as $userType){
                            ?>  
                                <option value="<?= $userType->getId();?>"><?= $userType->getNom();?></option>
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
        <table>
            <?php
                if(!empty($user)){
                    var_dump($user);
            ?>
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
                        
                        //var_dump($object["id"]);
                        
                        var_dump($user->getId());
                        die();
                        ?>  
                        <tr>
                            

                        </tr>
                        <?php
                    }
                }
                ?>
        </table>
    </div>
</div>
<?= $footer ?>