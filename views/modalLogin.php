<div class="modal fade" id="login">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Log in</h2>
            </div>
            <div class="modal-body">
                <blockquote>
                    <form action="services/loginService.php" method="POST">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name ="email" id="email" placeholder="Votre e-mail">
                        </div>
                        <div class="form-group">
                            <label for="pass">Mot de passe</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </blockquote>
            </div>
        </div>
    </div>
</div>