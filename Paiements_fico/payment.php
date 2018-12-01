
<?php
require '../PHP/callBack.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require './vendor/autoload.php';
$ids= require './paypal.php';



//Api permettant de recuperer les parametres de connexion
$apiContext=new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                        $ids['id'],
                        $ids['secret']
                        )
        );
     
//Mise en place de la transaction
//Il faut recuperer les elements du panier


              
           $list=new \PayPal\Api\ItemList();
             if (isset($_COOKIE['panier'])) 
                {
                    $products = json_decode($_COOKIE['panier']);  
                      foreach ($products as $product)
                      {   
                          $item=new PayPal\Api\Item();
                          $item->setName(getIT("articles/".$product->id)[0]->articleLibelle);
                          $item->setPrice(getIT("articles/".$product->id)[0]->prix);
                          $item->setCurrency('EUR');
                          $item->setQuantity($product->quantity);  
                          $list->addItem($item);
                   
                      } 

                }
     

//         les sous_total des produits (sans les frais de livraison)...
                $details=new PayPal\Api\Details();
                     $details->setSubtotal(getTotal()); 
                      
                     

             //Dans cette partie on définis le prix total du panier 
             //y compris les frais de livaisson
                $amount=(new PayPal\Api\Amount())
                        ->setTotal(getTotal())
                        ->setCurrency('EUR')
                        ->setDetails($details); 
                
             
                //On définir la transaction ici
                $transatction=(new \PayPal\Api\Transaction())
                                ->setItemList($list)
                                ->setDescription('Achat sur FicoMarket')
                                ->setAmount($amount)
                                ->setCustom('ID_Commande');

                
                    //  On va définir le paiement
                    $payment=new PayPal\Api\Payment();
                    $payment->setTransactions([$transatction]);  

                $payment->setIntent('sale');
                //l'url de redirection
                $redirect_urls=(new PayPal\Api\RedirectUrls())
                                ->setReturnUrl('http://192.168.1.113/pay.php')
                                ->setCancelUrl('http://192.168.1.113/panier.php');
                $payment->setRedirectUrls($redirect_urls);
                
                
                //Utilisation de l'interface paypal
                $payment->setPayer((new \PayPal\Api\Payer())->setPaymentMethod('paypal'));
                var_dump($payment);
                try{
                    //la methode permettant de creer le paiement
                        $payment->create($apiContext);
                        
                     //la methode permettant de renvoyer le lien vers lequel
                    //nous devons rediriger l'utilisateur pour qu'il accepte le paiement
                    header('Location: ' .$payment->getApprovalLink());
                    
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                    echo '<h3>Oups ! Problème de connexion...</h3>';
                   
                }

       





