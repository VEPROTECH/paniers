<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of favoris
 *
 * @author Verbeck DEGBESSE
 */
class favoris {
       private $DB;
    public function __construct($DB) {
       if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['favoris'])){
            /*si la session du favoris existe, on ajoute les id des produits
             * dans une session de tableau
             */
            $_SESSION['favoris'] = array();
        }
        $this->DB=$DB;
//        Supression d'un élément du favoris avec la fonction del() de la classe favoris-->
        if(isset($_GET['delFavoris'])){
            $this->del($_GET['delFavoris']);
        }


//        modification des quantités
//            if(isset($_POST['panier']['qte'])){
//                $this->recalc();
//            }
    }


      /* fonction de suppression d'un produit du favoris*/
    public function del($product_id){
          unset($_SESSION["favoris"][$product_id]);
    }

      /* fonction d'Ajoute de favoris*/
    public function add($product_id){
        /*ici si le produit existe dans le panier, il faut l'annuler
         * sinon, on l'ajoute
         */
        if(isset($_SESSION['favoris'][$product_id])){
                 unset($_SESSION["favoris"][$product_id]);
        }else{
            $_SESSION["favoris"][$product_id]=1;
        }

    }

      /*le nombre d'element dans le favoris*/
    public function count_fav(){
        return array_sum($_SESSION['favoris']);
    }

}
