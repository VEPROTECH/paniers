<?php 
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
    /*Ajouter le produit au panier grace à la fonction add de la classe panier*/
  $panier->add($product[0]->id); 
  $json['error']=false;
  $json['total'] =$panier->total();
  $json['count'] =$panier->count();
  $json["message"]="Vous avez ajouté un produit au panier.";
}else{
    $json["message"]="Vous n'avez pas de produit à ajouter au panier";
}
echo json_encode($json);