<div class="modal fade" id="modifyUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><!-- &times; --></button>
                <h2>Modification des information personnelles</h2>
            </div>
            <div class="modal-body">
                <blockquote>
                    <form action="services/signinService.php" method="POST">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" name ="pseudo" id="pseudo" value="<?=$user->getPseudo();?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name ="email" id="email" value="<?=$user->getEmail();?>">
                        </div>
                        <div class="form-group">
                            <label for="emailConf">Confirmer E-mail</label>
                            <input type="email" class="form-control" name ="emailConf" id="emailConf" value="<?=$user->getEmail();?>">
                        </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </blockquote>
            </div>
        </div>
    </div>
</div>