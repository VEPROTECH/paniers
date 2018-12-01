<?php

/*la classe permettant de contenu toute les classes a utilisé sur une page
 * ainsi c'est seulement ce fichier nous allons appelé sur les pages
 * puisqu'elle comporte toute les classes et méthodes à utilisées
 */
require 'DB.php';
require 'paniers.php';
require 'favoris.php';
$db=new DB();
$panier=new paniers($db);
$favoris=new favoris($db);
