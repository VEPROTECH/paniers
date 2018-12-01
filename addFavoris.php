<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*Classe comportants la liste des classes à utilisé*/
require 'PHP/callBack.php';

$json=array('error' => true);
if(isset($_GET['id'])){
    /*execution de la requete permettant d'afficher toute l'id
     *  du produit ajouter au panier
     */
    $product=$db->query("SELECT id FROM matable WHERE id=:id",array("id" =>$_GET["id"]));
    if(empty($product)){
        $json["message"]="Ce produit n'existe pas !";
    }
    /*Ajouter le produit au panier grace à la fonction add de la classe favoris*/  
  $favoris->add($product[0]->id); 
  $json['error']=false;  
  $json['count__favoris'] = $favoris->count_fav();
  
   header('location:index.php');
   
  $json["message"]="Vous avez ajouté un produit au favoris.";
  
}else{
    $json["message"]="Vous n'avez pas de produit à ajouter au favoris";
}
echo json_encode($json);