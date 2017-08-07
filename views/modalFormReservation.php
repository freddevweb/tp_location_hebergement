<div class="modal fade" id="reservation">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Réserver</h2>
            </div>
            <div class="modal-body">
                <blockquote>
                    <form action="services/reservationService.php" method="POST">
                        <!-- dates souhaitées -->
                        <div class="form-group">
                            <label for="arrivee">Date d'arrivée souhaitée</label>
                            <input type="date" class="form-control" name ="arrivee" id="arrivee">
                        </div>
                        <div class="form-group">
                            <label for="depart">Date de départ</label>
                            <input type="date" class="form-control" name="depart" id="depart">
                        </div>
                        <div class="form-group">
                            <label for="voyageurs">Date de départ</label>
                            <input type="number" class="form-control" name="voyageurs" id="voyageurs">
                        </div>
                        <!-- texte d'accompagnement -->
                        <div class="form-group">
                            <label for="courrier">Mot de passe</label>
                            <textarea type="text" class="form-control" name="courrier" id="courrier" placeholder="Accompagnez votre demande avec un petit courrier"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </blockquote>
            </div>
        </div>
    </div>
</div>