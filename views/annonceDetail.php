<?=$header?>
<?=$nav?>
<?php
// var_dump($retour);
// die();
?>
<div class="container-fluid">
    <div class="row">
        <div class"row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-offset-2 col-xs-12">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="carrousselDetail">
                        <div class="item active align-middle">
                            <img class="img-rounded " alt="<?= $annonce["photos"][0]["titre"]?>" title ="<?= $annonce["photos"][0]["titre"]?>" src="../<?= $annonce["photos"][0]["photo_path"] ?>" />
                            <h3 class="carousel-caption"><?= $annonce["photos"][0]["titre"]?></h3>
                        </div>
                        <?php 
                        foreach( $annonce["photos"] as $key => $val){
                            if($key > 0){
                        ?>
                            <div class="item align-middle">
                                <img class="img-rounded " alt="<?= $val["titre"]?>" title ="<?= $val["titre"]?>" src="../<?= $val["photo_path"]?>">
                                <h3 class="carousel-caption"><?= $val["titre"]?></h3>
                            </div>
                        <?php }
                        } 
                        ?>
                    </div>
                    <a class="left carousel-control" href="#carousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-nowrap">
                <h3 class="text-center"><strong><?= $annonce["titre"]?></strong></h3>
                <div class="row">
                    <h4 class="text-center col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-6"><strong>A <?=$annonce["ville"]?></strong><h4>
                    <h4 class="text-center col-lg-3 col-md-3 col-sm-3 col-xs-6"><strong>A partir de <?=$annonce["tarif"]?></strong><h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-7 col-xs-12">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p><?=$annonce["description"]; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-nowrap">
                        <ul><strong>Equipements du logement :</strong>
                            <?php if($annonce["fumeur"] == 1 ){  ?>
                                    <li>Fumeur</li>
                            <?php } ?>
                            <?php if($annonce["television"] == 1 ){  ?>
                                    <li>television</li>
                            <?php } ?>
                            <?php if($annonce["chauffage"] == 1 ){  ?>
                                    <li>chauffage</li>
                            <?php } ?>
                            <?php if($annonce["climatisation"] == 1 ){  ?>
                                    <li>climatisation</li>
                            <?php } ?>
                            <?php if($annonce["sdb"] == 1 ){  ?>
                                    <li>salle de bain</li>
                            <?php } ?>
                            <?php if($annonce["parking"] == 1 ){  ?>
                                    <li>parking</li>
                            <?php } ?>
                            <?php if($annonce["laveLinge"] == 1 ){  ?>
                                    <li>laveLinge</li>
                            <?php } ?>
                            <?php if($annonce["wifi"] == 1 ){  ?>
                                    <li>wifi</li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <ul><strong>Propriétés du logement :</strong> 
                            <li>Nombre de pièce : <?=$annonce["nbrePieces"] ; ?></li>
                            <li>Nombre de chambre : <?=$annonce["nbreChambre"]; ?></li>
                            <li>Surface : <?=$annonce["surface"]; ?>m²</li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <ul><strong>Modalités de la location :</strong> 
                            <li>Arrivée entre <?=$annonce["arriveeDebut"]; ?> et <?=$annonce["arriveeFin"]; ?>.</li>
                            <li>Heure de départ maximum <?=$annonce["hDepart"]; ?>.</li>
                            <li>Capacité maximum d'hébergement : <?=$annonce["capacite"]; ?> personnes</li>
                        </ul>
                    </div>
                    <div>
                        <?php if($annonce["user_id"] == $_SESSION["id"]){ ?>
                            <p>
                                <form action="../services/saveAnnonceService.php" method="post">
                                    <div class="hidden">
                                        <input type="number" name ="id" value="<?=$annonce["id"] ; ?>">
                                        <input type="text" name ="adress" value="<?=$annonce["adress"] ; ?>">
                                        <input type="text" name ="cp" value="<?=$annonce["codePostal"] ; ?>">
                                        <input type="text" name ="ville" value="<?=$annonce["ville"] ; ?>" />
                                        <input type="radio" name="type" value="1" <?php if($annonce["type_logement_id"] == 1){?>checked <?php } ?> />
                                        <input type="radio" name="type" value="2" <?php if($annonce["type_logement_id"] == 2){?>checked <?php } ?> />
                                        <input type="radio" name="type" value="3" <?php if($annonce["type_logement_id"] == 3){?>checked <?php } ?> />
                                        <input type="radio" name="type" value="4" <?php if($annonce["type_logement_id"] == 4){?>checked <?php } ?> />
                                        <input type="radio" name="type" value="5" <?php if($annonce["type_logement_id"] == 5){?>checked <?php } ?> />
                                        <input type="checkbox" name="fumeur" value="TRUE" <?php if($annonce["fumeur"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="television" value="TRUE" <?php if($annonce["television"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="chaufage" value="TRUE" <?php if($annonce["chauffage"] == 1){ ?>checked <?php } ?> />
                                        <input type="checkbox" name="climatisation" value="TRUE" <?php if( $annonce["climatisation"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="sdb" value="TRUE" <?php if( $annonce["sdb"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="parking" value="TRUE" <?php if( $annonce["parking"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="laveLinge" value="TRUE"  <?php if( $annonce["laveLinge"] == 1){?>checked <?php } ?> />
                                        <input type="checkbox" name="wifi" value="TRUE" <?php if( $annonce["wifi"]  == 1){?>checked <?php } ?> />
                                        <input type="text" name ="titre" value="<?=$annonce["titre"] ; ?>">
                                        <textarea name ="description"><?=$annonce["description"] ; ?></textarea>
                                        <input type="text" name ="surface" value="<?=$annonce["surface"] ; ?>">
                                        <input type="number" name ="pieces" value="<?=$annonce["nbrePieces"] ; ?>">
                                        <input type="number" name ="chambre" value="<?=$annonce["nbreChambre"] ; ?>">
                                        <input type="number" name ="capacite" value="<?=$annonce["capacite"] ; ?>">
                                        <input type="time" name ="heureCleMin" value="<?=$annonce["arriveeDebut"] ; ?>">
                                        <input type="time" name ="heureCleMax" value="<?=$annonce["arriveeFin"] ; ?>">
                                        <input type="time" name ="depart" value="<?=$annonce["hDepart"] ; ?>">
                                        <input type="number" name ="tarif" value="<?=$annonce["tarif"] ; ?>">
                                        <input type="text" name ="from" value="modify">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                        <input type="submit" value="Modifier l'annonce" class="btn btn-default" />
                                    </div>
                                </form> 
                            </p>
                        <?php } ?>
                    </div>
                </div>
            
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="row"><p>&nbsp;</p><p>&nbsp;</p></div>
                <div class="jumbotron">
                    <div>
                        <?php if(!empty($retour) ){ echo $retour; } ?>
                    </div>
                    <form action="../services/reserverService.php" method="POST">
                        <div class="hidden">
                            <input type="text" name="quoi" value="<?= $annonce["id"];?> "/>
                        </div>
                        <div class="form-group ">
                            <label for="arrivee">Date d'arrivée</label>
                            <input type="date" class="form-control" name ="arrivee" id="arrivee">
                        </div>
                        <div class="form-group ">
                            <label for="depart" >Date de départ</label>
                            <input type="date" class="form-control" name="depart" id="depart">
                        </div>
                        <button type="submit" class="btn btn-default">Réserver</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">var dates = <?php // $dates;?>;</script>  -->
<!-- <script type="text/javascript" src="../js/dates.js"></script>    -->
<!-- datepicker of jquery ui non achevé
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
                    <p>Arrivée: <input type="text" id="datepicker" class="hasDatepicker"></p>
                    <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all " style="position: absolute; top: 37px; left: 50.6875px; z-index: 1; display: block;">
                        <div class="ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all">
                            <a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="Prev">
                                <span class="ui-icon ui-icon-circle-triangle-w">Prev</span>
                            </a>
                            <a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="Next">
                                <span class="ui-icon ui-icon-circle-triangle-e">Next</span>
                            </a>
                            <div class="ui-datepicker-title">
                                <span class="ui-datepicker-month">August</span>
                                &nbsp;
                                <span class="ui-datepicker-year">2017</span>
                            </div>
                        </div>
                        <table class="ui-datepicker-calendar">
                            <thead>
                                <tr>
                                    <th scope="col" class="ui-datepicker-week-end"><span title="Sunday">Su</span></th>
                                    <th scope="col"><span title="Monday">Mo</span></th>
                                    <th scope="col"><span title="Tuesday">Tu</span></th>
                                    <th scope="col"><span title="Wednesday">We</span></th>
                                    <th scope="col"><span title="Thursday">Th</span></th>
                                    <th scope="col"><span title="Friday">Fr</span></th>
                                    <th scope="col" class="ui-datepicker-week-end"><span title="Saturday">Sa</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">1</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">2</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">3</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">4</a></td>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">5</a></td>
                                </tr>
                                <tr>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">6</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">7</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">8</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">9</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">10</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">11</a></td>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">12</a></td>
                                </tr>
                                <tr>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">13</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">14</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">15</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">16</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">17</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">18</a></td>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">19</a></td>
                                </tr>
                                <tr>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">20</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">21</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">22</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">23</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">24</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">25</a></td>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">26</a></td>
                                </tr>
                                <tr>
                                    <td class=" ui-datepicker-week-end " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">27</a></td>
                                    <td class=" ui-datepicker-days-cell-over  ui-datepicker-today" data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default ui-state-highlight ui-state-hover" href="#">28</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">29</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">30</a></td>
                                    <td class=" " data-handler="selectDay" data-event="click" data-month="7" data-year="2017"><a class="ui-state-default" href="#">31</a></td>
                                    <td class=" ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                    <td class=" ui-datepicker-week-end ui-datepicker-other-month ui-datepicker-unselectable ui-state-disabled">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            -->
<?=$footer?>