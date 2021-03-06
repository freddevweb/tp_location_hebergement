<div class="modal fade" id="signin">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><!-- &times; --></button>
                <h2>Sign in</h2>
            </div>
            <div class="modal-body">
                <blockquote>
                    <form action="services/signinService.php" method="POST">
                        <div class="form-group">
                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" name ="pseudo" id="pseudo" placeholder="Votre pseudo">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name ="email" id="email" placeholder="Votre e-mail">
                        </div>
                        <div class="form-group">
                            <label for="emailConf">Confirmer E-mail</label>
                            <input type="email" class="form-control" name ="emailConf" id="emailConf" placeholder="Confirmez votre e-mail">
                        </div>
                        <div class="form-group">
                            <label for="pass">Mot de passe</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="passConf">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" name="passConf" id="passConf" placeholder="Votre mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="passConf">Souhaitez-vous vous inscrire en tant que voyageur ou hote ?</label>
                            <select name="def" id="def">
                                <option value="voyageur">voyageur</option> 
                                <option value="hote">Hote</option>
                            </select>
                            <p class="help-bloc">A tout moment vous pourrez changer de catégorie</p>
                        </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </blockquote>
            </div>
        </div>
    </div>
</div>