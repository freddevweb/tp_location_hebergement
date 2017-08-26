
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
        <div class="navbar-right navbar-form inline-form">
                <button type="button" data-toggle="modal" data-target="#login" class="btn btn-inverse navbar-btn btn-sm">Log in</button>
                <button type="button" data-toggle="modal" data-target="#signin" class="btn btn-inverse navbar-btn btn-sm">Sign in</button>
        </div>
    </div>
</nav>
<?php

require "modalLogin.php";
require "modalSignin.php";