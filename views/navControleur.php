<nav class="navbar navbar-inverse navbar-static-top" role="navigation">   
    <div class="navbar-header">   
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#top">RBNB</a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <div class="btn-group"> 
                <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"> Accounts </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Loueur</a></li>
                    <li><a href="#">User</a></li>
                </ul>
            </div>
            <div class="btn-group"> 
                <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"> Annonces </a>
                <ul class="dropdown-menu">
                    <li><a href="#">A valider</a></li>
                    <li><a href="#">Loueur</a></li>
                    <li><a href="#">Lieux</a></li>
                    <li><a href="#">Favoris</a></li>
                </ul>
            </div>
            <div class="btn-group"> 
                <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"> Commentaires </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Annonce</a></li>
                    <li><a href="#">Loueur</a></li>
                    <li><a href="#">Max</a></li>
                </ul>
            </div>
            <div class="btn-group"> 
                <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"> Locations </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Echue</a></li>
                    <li><a href="#">En cours</a></li>
                    <li><a href="#">A venir</a></li>
                    <li><a href="#">Top</a></li>
                </ul>
            </div>
            <li> <a class="btn btn-inverse btn-xs" href="annoncesAll">Voyager</a> </li>
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