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
            $var=$favoris->count_fav();
//            si le favoris est vide affiché que le contenu du favoris est vide sinon
//            affiché le tableau
            if($var == 0){
       ?>
    <div class="well" style="margin-bottom: 20%">
                <span class="text-primary">
                    <strong>
                        <h3 class="text-center">
                            Votre liste de souhait est Vide ! <br/>
                            <img class="img-fluid img-circle img-thumbnail" src="images/icon_pan.png">
                        </h3> 
                        
                    </strong>
                </span>
            </div>
    <?php
            }else{
         ?> 
      <div class="row">
                  <div class="col-md-offset-4 col-md-4 text-center">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                        <h3 class="panel-title">Mes souhaits</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-advance table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Produits</th>
                                        <th>Nom du Produit</th>
                                        <th>Prix unitaire</th>                                                                             
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        /*Récupération des clés du tableau
                                         * c'est a dire récuperer tous les ids des produits mis en session
                                         * dans un tableau
                                         */
                                    $ids= array_keys($_SESSION["favoris"]);
                                 
                                    /*si aucun id, alors afficher tableau vide*/
                                        if(empty($ids)){
                                            $products = array();
                                        }else{
                                             $products=$db->query('SELECT * FROM matable WHERE id IN ('.implode(',', $ids).')');
                                    
                                        }
                                   foreach ($products as $product):
                                    ?>
                                <form class="form-inline" method="post" action="monFavoris.php">
                                    <tr>
                                       
                                        <td><img src="http://localhost/Paniers/images/<?php echo $product->image;?>" alt=""  style="padding:5px;height: 53px"/></td>
                                
                                        <td><?php echo $product->name;?></td>
                                        <td><?php echo number_format($product->price,2,',',' ');?> FCFA</td>
                                        <td>
                                            <div class="row">
                                            <button class=" col-sm-6 btn btn-default" type="submit" style="background-color:#f56121;float: left;display: block">
                                                <a href="monFavoris.php?delFavoris=<?php echo $product->id;?>"> 
                                                     <i class="fa fa-close" style="color: #fff"></i>
                                                </a>   
                                            </button>
                                                
                                            <button class="col-sm-6 btn btn-default" type="submit" style="background-color:green; float: left;display: block">
                                                <a class="addPanier" href="addPanier.php?id=<?php echo $product->id;?>"> 
                                                     <i class="fa fa-shopping-basket" style="color: #fff"></i>
                                                </a>   
                                            </button>
                                            </div>     
                                        </td>
                                     
                                    </tr>
                                        </form>
                                    <?php endforeach;?>
                                  
                                </tbody>
                            </table>

                        </div>
                          
                        </div>
                      

                  </div>
                  
                 
              
                  
              </div>   
    <?php
            }
    ?>      
     
                  
              </div>
       
 <?php include 'PHP/_footer.php';?>