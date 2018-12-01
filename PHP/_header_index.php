<?php
/*Classe comportants la liste des classes à utilisé*/
require 'callBack.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php include 'title_file.php';?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=no">
    <title>PeroMarket | Boutique virtuelle en ligne</title>
    <meta property="og:site_name" content="PeroMarket">
    <meta name="description" content="Boutique virtuelle en ligne">
    <link rel="canonical" href="https://www.peromarket.com/">

    <link rel="stylesheet" href="core.css">
    <link href="./css/category.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/home.css">
    <style>@media (min-width:640px){}</style>

    <!--<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">-->
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="./styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="./styles/categories_responsive.css">
    <link rel="stylesheet" type="text/css" href="../plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <link href="assets/css/main-style.css" rel="stylesheet" />
    <script async="" src="https://static.ads-twitter.com/uwt.js"></script>

    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript">
        function onVisaCheckoutReady(){
            V.init( {
                apikey: "MY2J76G53N4SI5GV22QD21xXbUInmdq1-5j7nbwYcKYgcm060",
                paymentRequest:{
                    currencyCode: "USD",
                    subtotal: "11.00"
                }
            });
            V.on("payment.success", function(payment)
            {alert(JSON.stringify(payment)); });
            //{alert("success"); });
            V.on("payment.cancel", function(payment)
            {alert(JSON.stringify(payment)); });
            V.on("payment.error", function(payment, error)
            {alert(JSON.stringify(error)); });
        }
    </script>

</head>

<header class="header trans_300">

    <!-- Top Navigation -->
    <!---->
    <!--                <div class="top_nav" style="background-color: #f0ffff; height: 60px; ">-->
    <!--			<div class="container">-->
    <!--				<div class="row">-->
    <!--					-->
    <!--                      -->
    <!--                        <div class="col-md-8">-->
    <!--                             <div class="top_nav_right" style="color:#f56121;left: 280px;margin-top:4px;">-->
    <!--                                -->
    <!--                            -->
    <!--                                         <div class="input-group col-lg-8 has-feedback center-align">-->
    <!---->
    <!--                                                <input style=" border-color:#f56121;" type="search" class="form-control" name="recherche" placeholder="Rechercher un produit,une boutique, une categorie, ..."/>-->
    <!--                                                <span class="input-group-btn">-->
    <!--                                                    <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>-->
    <!--                                                </span>-->
    <!--                                           </div>-->
    <!--                                  -->
    <!--                            </div>-->
    <!--                        </div>-->
    <!---->
    <!--					<div class="col-md-4 text-right" >-->
    <!--						<div class="top_nav_right">-->
    <!--							<ul class="top_nav_menu">-->
    <!---->
    <!--					-->
    <!--								<li class="language" style="background-color: #f0ffff" >-->
    <!--									<a href="#" style="color:#000">-->
    <!--										Français-->
    <!--										<i class="fa fa-angle-down"></i>-->
    <!--									</a>-->
    <!--									<ul class="language_selection">-->
    <!--										<li><a href="#" style="color:#000">Anglais</a></li>-->
    <!--									-->
    <!--									</ul>-->
    <!--								</li>-->
    <!--								<li class="account" style="background-color: #f0ffff">-->
    <!--                                                                    <a href="#" style="color:#000">-->
    <!--                                                                            <i class="fa fa-user"></i>-->
    <!--										Mon Compte-->
    <!--										-->
    <!--									</a>-->
    <!--									-->
    <!--								</li>-->
    <!--                                                                 -->
    <!--                                                              -->
    <!--							</ul>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>-->


    <!-- Main Navigation -->

    <div class="main_nav_container" style="box-shadow:0px 2px 0px rgba(0,0,0,0.15); background-color: #f0ffff;">

        <!--                    <span class="navbar_user" style="display: block;  position: absolute; right: 0px; margin-right: 5%; border-left: 1px solid #000">
                                                <li class="checkout">
							<a href="./MonPanier.php">
								<i class="fa fa-shopping-basket" aria-hidden="true" style="color:#f56121"></i>
                                                                    <span id="checkout_items" class="checkout_items" style="background-color:#0e5490"><?php echo $panier->count();?></span>
                                                                                
							</a>
                                                   
						</li> 
                                                <br/>
                                                <div>  </div>
                                                                
                                                    <li class="checkout">
                                                                 <a href="#">
                                                     <i class="fa fa-heart" aria-hidden="true" style="color:#f56121"></i>
                                                            <span id="checkout_items" class="checkout_items" style="background-color:#0e5490">1</span>

                                                            </a>
                                                    </li>
                                                                
                    </span>-->



        <div style="text-align: center" class="row">
            <a style="text-transform: inherit;font-size: 2em" href="index.php">
                                    <span style="font-family: Pacifico">
                                        Site Test
                                    </span>
            </a>

        </div>





        <div style="margin-right: 8%">
            <div class="row">

                <div class="col-lg-12">

                    <nav style="margin-bottom: 0;height: 70px;margin-right: 10%;" class="navbar">

                        <ul class="navbar_menu" style="">
                            <li><a href="index.php" style="font-weight: bold">Accueil</a></li>
                            <li><a href="#" style="font-weight: bold;">Nos services</a></li>
                            <li><a id="bout_nav" href="index.php" style="font-weight: bold">Boutiques</a></li>
                            <li><a id="cat_nav" href="#" style="font-weight: bold">Catégories</a></li>

                            <!--<li> <a href="#" style="font-weight: bold">Téléchargements</a></li>-->

                            <li><a href="#" style="font-weight: bold">Qui sommes-nous ?</a></li>
                            <span class="navbar_user">
                                                <li class="checkout">
							<a href="./MonPanier.php">
								<i class="fa fa-shopping-basket" aria-hidden="true" style="color:#f56121"></i>

                                <!--  l'id count ici est utilisé dans le javascript app.js pour actualiser la quantité des
                                produits ajouter au panier-->
                                                                    <span id="count" class="checkout_items" style="background-color:#0e5490">
                                                                        <?php echo $panier->count();?>
                                                                    </span>
                                                                                
							</a>
                                                   
						</li> 
                                              
                                                                
                                                    <li class="checkout">
                                                           <a href="monFavoris.php">
                                                     <i class="fa fa-heart" aria-hidden="true" style="color:#f56121"></i>
                                                            <span id="count_favoris" class="checkout_items" style="background-color:#0e5490">
                                                                <?php echo $favoris->count_fav();?>
                                                            </span>

                                                            </a>
                                                    </li>
                                                                
                    </span>

                        </ul>


                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


</header>






<body  style="background-color: #c3b091; ">