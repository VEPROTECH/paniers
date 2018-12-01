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
             
                  <div class="panel">
                      <div class="panel-body panel-primary">
                          <div class="row">
                              
                            <?php $products = $db->query('SELECT * FROM matable'); ?>
                              <?php foreach ($products as $product) : ?>
                              
                              <div class="col-lg-3">
                                  <div class="img-thumbnail">
                                  <div>
                                      <div class="row">
                                          <div class="col-sm-6 text-left">
                                              <a class="addFavoris" href="addFavoris.php?id=<?php echo $product->id;?>" style="color:#ff6404; font-size: 20px"><i class="fa fa-heart-o"></i></a>
                                          </div>
                                          
                                          <div class="col-sm-6 text-right">
                                              <a class="addPanier" href="addPanier.php?id=<?php echo $product->id;?>" style="color:#ff6404; font-size: 20px"><i class="fa fa-shopping-cart"></i></a>
                                          </div>
                                      </div>
                                     
                                  </div>

                                  <div class="image-block">
                                      <a href="#"><img   src="http://localhost/paniers/images/<?php echo $product->image;?>.JPG" class="img-fluid"></a><br/>
                                  </div>
                                  </div>
                                  <div class="text-center">
                                  <span><strong><?php echo $product->name;?></strong></span><br>
                                  <span style="color: #ff6404"><strong><?php echo number_format($product->price,2,',',' ');?> FCFA</strong></span>
                                  </div>
                              </div>
                              
                              <?php endforeach;?>
                          </div>
                      </div>
                  </div>
 
              </div>         
            
       
 <?php include 'PHP/_footer.php';?>
