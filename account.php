<?php
if ( isset($_COOKIE['b']) && isset($_COOKIE['h']) ) 
{
    $u = json_decode($_COOKIE['b']);
}

//Declare title
$title = "Mon compte";
//Require header Metas & header
require 'pages/includes/htmlheader.php';
require 'pages/includes/header.php';

 //print_r($_COOKIE['h']);
//Page Start
?>


<div class="breadcrumb-box">
    <a href="index.php">Accueil</a>
    <a href="#">Mon compte</a>
</div>

<div class="information-blocks">
    <div class="row">
    <div class="col-sm-12">
        <h3 class="block-title main-heading text-center" style="margin:10px;">Salutations, <?php echo $u->prenom . " " . $u->nom;?></h3>
    </div>
    <div class="col-md-10 col-md-push-1" style="">
        <div class="col-xs-12 col-sm-6">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-flag"></i></div>
                    <div class="info">
                        <h3 class="title">Commandes</h3>
                        <p>
                            Voir l'historique de vos commandes
                        </p>
                        <div class="more">
                            <a href="orders.php" title="Title Link">
                                Aller <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>       
        <div class="col-xs-12 col-sm-6">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-map-marker"></i></div>
                    <div class="info">
                        <h3 class="title">Adresses</h3>
                        <p>
                            Ajouter, modifier vos adresses
                        </p>
                        <div class="more">
                            <a href="adresses.php" title="Title Link">
                                Aller <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
        
        <div class="col-xs-12 col-sm-6">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-heart"></i></div>
                    <div class="info">
                        <h3 class="title">Liste d'envies</h3>
                        <p>
                            Voir, modifier votre liste d'envies.
                        </p>
                        <div class="more">
                            <a href="whishlist.php" title="Title Link">
                                Aller <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-user"></i></div>
                    <div class="info">
                        <h3 class="title">Profil</h3>
                        <p>
                            Ajoutez, modifier vos informations personnels.
                        </p>
                        <div class="more">
                            <a href="#" title="Title Link">
                                Aller <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div> 
    </div>        
        <!-- /Boxes de Acoes -->
    </div>
</div>


<?php
//Require Footer
require 'pages/includes/footer.php';

//Page Popups
?>




<?php
//Require footer's Misc
require 'pages/includes/htmlfooter.php';
?>