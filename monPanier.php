<?php include 'PHP/_header_index.php';?>



   </head>
        <body>
               
  
     
    <br>
      <br>
        <br>
        <br>
      <br>
        <br>
           <br>
        <br>
      <br>
        <br>
 

<!-- breadcrumbs -->
<div class="container">
    
     <?php 
            $var=$panier->count();
//            si le panier est vide affiché que le contenu du panier est vide sinon
//            affiché le tableau
            if($var == 0){
       ?>
    <div class="well" style="margin-bottom: 20%">
                <span class="text-primary">
                    <strong>
                        <h3 class="text-center">
                            Votre panier est vide ! <br/>
                            <img class="img-fluid img-circle img-thumbnail" src="images/icon_pan.png">
                        </h3> 
                        
                    </strong>
                </span>
            </div>
    <?php
            }else{
         ?> 
      <div class="row">
                  <div class="col-md-9 text-center">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                        <h3 class="panel-title">Mon Panier</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-advance table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Produits</th>
                                        <th>Nom du Produit</th>
                                        <th>Prix unitaire</th>
                                        <th>Quantité</th>
                                        <th>Sous total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        /*Récupération des clés du tableau
                                         * c'est a dire récuperer tous les ids des produits mis en session
                                         * dans un tableau
                                         */
//                                        var_dump($panier->sous_total());
                                    $ids= array_keys($_SESSION["panier"]);
                                    /*si aucun id, alors afficher tableau vide*/
                                        if(empty($ids)){
                                            $products = array();
                                        }else{
                                             $products=$db->query('SELECT * FROM matable WHERE id IN ('.implode(',', $ids).')');
                                    
                                        }
                                   foreach ($products as $product):
                                    ?>
                                     <form class="form-inline" method="post" action="monPanier.php">
                                    <tr>
                                       
                                        <td><img src="http://localhost/Paniers/images/<?php echo $product->image;?>.JPG" alt=""  style="padding:5px;height: 53px"/></td>
                                
                                        <td><?php echo $product->name;?></td>
                                        <td><?php echo number_format($product->price,2,',',' ');?> FCFA</td>
                                        <td>
                                            
                                                <div class="input-group input-group-sm">
                                                    <input  type="text" class="form-control" name="panier[qte][<?php echo $product->id;?>]" value="<?php echo $_SESSION['panier'][$product->id];?>">
                                                <span class="input-group-btn">
                                                   
                                                    <button class="btn btn-default" type="submit"  style="background-color:#f56121">
                                                            <i class="fa fa-check-circle-o" style="color: #fff"></i>
                                                        </button>
                                                   
                                                 </span>
                                                </div>
                                           
                                        </td>
                                        <td><?php echo number_format($_SESSION['panier'][$product->id] * $product->price,2,',',' ');?></td>
                                        
                                        <td>
                                            <button class="btn btn-default" type="submit" style="background-color:#f56121;">
                                                 <a href="monPanier.php?delPanier=<?php echo $product->id;?>"> 
                                                     <i class="fa fa-close" style="color: #fff"></i>
                                                </a>   
                                            </button>
                                            
                                           
                                        </td>
                                     
                                    </tr>
                                        </form>
                                    <?php endforeach;?>
                                  
                                </tbody>
                            </table>

                        </div>
                          
                        </div>
                      

                  </div>
                  
                 
                  <div class="col-md-3 text-center">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        <h3 class="panel-title">Récapitulatif</h3>
                        </div>
                        <div class="panel-body">
                            <h4> Total (Hors frais de livraison) </h4>
                            <h4 class="text-success well" style="font-weight: bold">
                                <?php echo number_format($panier->total(),2,',',' '). " FCFA";?>
                            </h4>

                            <h4>Frais de livraison</h4>
                            <div class="text-success well" style="font-weight: bold">

                                <div  class="form-check">

                                   Frais de livraison = 1000 FCFA


                                </div>


                            </div>

                                               
                            <a href="Paiements/gandokintche.php"> <button class="btn btn-success" >Passer la commande</button></a>
                        </div>
                        </div>
                  </div>
                  
              </div>   
    <?php
            }
    ?>      
     
                  
              </div>
       
 <?php include 'PHP/_footer.php';?>