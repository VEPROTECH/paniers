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
                              
                            <?php $products = $db->query('SELECT * FROM site'); ?>
                              <?php foreach ($sites as $site) : ?>
                              
                              <div class="col-lg-3">
<!--                                  <div class="img-thumbnail">

                                  <div class="image-block">
                                      <a href="#"><img   src="http://localhost/Paniers/images/<?php // echo $product->image;?>" class="img-fluid"></a><br/>
                                  </div>
                                  </div>-->
                                  <div class="text-center">
                                  <span><strong><?php echo $site->nom;?></strong></span><br>
                                  <span style="color: #ff6404"><strong><?php echo $site->heure_ouverture.'-'.$site->heure_fermeture;?></strong></span>
                                  </div>
                              </div>
                              
                              <?php endforeach;?>
                          </div>
                      </div>
                  </div>
 
              </div>         
            
       
 <?php include 'PHP/_footer.php';?>
