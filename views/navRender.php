<nav class="navbar navbar-inverse navbar-static-top" role="navigation">   
    <div class="navbar-header">   
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=$url?>dashboardRender">RBNB</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li> <a class="btn btn-inverse btn-xs" href="<?=$url?>annoncesRender">Vos biens</a> </li>
            <li> <a class="btn btn-inverse btn-xs" href="#">Demandes de locations</a> </li>
            <li> <a class="btn btn-inverse btn-xs" href="#">Planing des réservations</a> </li>
            <li> <a class="btn btn-inverse btn-xs" href="<?=$url?>annoncesAll">Voyager</a> </li>
        </ul>
        <div class="navbar-right navbar-form inline-form">
            <a href="<?=$url?>profil">
                <span class="glyphicon glyphicon-user" title="Votre compte"></span>
            </a>
            <a href="<?=$url?>services/logoutService.php">
                <span class="glyphicon glyphicon-share" title="Logout"></span>
            </a>
        </div>
    </div>
</nav>

