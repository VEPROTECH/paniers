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

$apiContext->setConfig(
                array(
                     'mode'=> 'live',
                     'log.LogEnabled' => true,
                    'log.FileName' => '../PayPal.log'
                )
               
        );


//Récuperation du paiement
$payment= PayPal\Api\Payment::get($_GET['paymentId'],$apiContext);

$execution=(new PayPal\Api\PaymentExecution())
        ->setPayerId($_GET['PayerID'])
        ->setTransactions($payment->getTransactions());
try{
    $payment->execute($execution,$apiContext);
//    var_dump($execution);
//    var_dump($payment);
} catch (\PayPal\Exception\PayPalConnectionException $ex) {
//    var_dump(json_decode($ex->getData()));
}

