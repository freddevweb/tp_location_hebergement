<div class="modal fade" id="commentaire">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Commentaire</h2>
            </div>
            <div class="modal-body">
                <blockquote>
                    <form action="services/commentaireService.php" method="POST">
                        
                        <div class="form-group">
                            <label for="commentaire">Commentaire : </label>
                            <textarea type="text" class="form-control" name="commentaire" id="commentaire" placeholder="Votre commentaire"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </blockquote>
            </div>
        </div>
    </div>
</div>