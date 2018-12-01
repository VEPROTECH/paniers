<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paniers
 *
 * @author Verbeck DEGBESSE
 */

/*La classe permettant de gestion du pannier*/
class paniers {
    private $DB;
    public function __construct($DB) {
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            /*si la session du panier existe, on ajoute les id des produits
             * dans une session de tableau 
             */
            $_SESSION['panier'] = array();
        }
        
        $this->DB=$DB;
//        Supression d'un élément du panier avec la fonction del() de la classe panier-->
        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }
        
        
//        modification des quantités
            if(isset($_POST['panier']['qte'])){
                $this->recalc();
            }
    }
    
//    parcourie les elements du panier et recalculer
    public function recalc(){
        foreach ($_SESSION['panier'] as $product_id=>$qte){
            if(isset($_POST['panier']['qte'][$product_id])){
                 $_SESSION['panier'][$product_id]=$_POST['panier']['qte'][$product_id];
            }
        } 
    }


    /* fonction d'Ajoute de produit au panier*/
    public function add($product_id){
        /*ici si le produit existe dans le panier, il faut l'incrémenter de 1
         * sinon, on l'initialise à 1
         */
        if(isset($_SESSION['panier'][$product_id])){          
             $_SESSION["panier"][$product_id]++;
        }else{
            $_SESSION["panier"][$product_id]=1;
        }
         
    }
    
     /* fonction de suppression d'un produit du panier*/
    public function del($product_id){
          unset($_SESSION["panier"][$product_id]);
    }
    
       /* Total du panier*/
    public function total(){
        $total=0;
            /*Récupération des clés du tableau
           * c'est a dire récuperer tous les ids des produits mis en session
        * dans un tableau
        */
      $ids= array_keys($_SESSION["panier"]);
         /*si aucun id, alors afficher tableau vide*/
        if(empty($ids)){
              $products = array();
       }else{
            /*sinon executé la requete pour chaque id ajouter au panier avec implode */
          $products=$this->DB->query('SELECT id,price FROM matable WHERE id IN ('.implode(',', $ids).')');
                                    
       }
        foreach ($products as $product){
            $total +=$product->price * $_SESSION['panier'][$product->id];
        }
        return $total;
    }
    
//    calcul des sous total
    
         /* Total du panier*/
    public function sous_total() {
       
        $sous_total['st']=array();
        $i=-1;
            /*Récupération des clés du tableau
           * c'est a dire récuperer tous les ids des produits mis en session
        * dans un tableau
        */
      $ids= array_keys($_SESSION["panier"]);
         /*si aucun id, alors afficher tableau vide*/
        if(empty($ids)){
              $products = array();
       }else{
            /*sinon executé la requete pour chaque id ajouter au panier avec implode */
          
          $products=$this->DB->query('SELECT id,price FROM matable WHERE id IN ('.implode(',', $ids).')');
          foreach ($products as $value) {
              $i++;
              $sous_total['st'][$i]=$_SESSION['panier'][$value->id] * $value->price;
          }
       
          
         
          
         }
         
    }

    
    /*le nombre d'element dans le panier*/
    public function count(){
        return array_sum($_SESSION['panier']);
    }
    
}
