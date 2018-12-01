
<?php
require '../PHP/callBack.php';

require './SDK/callback.php';

//Mise en place de la transaction
//Il faut recuperer les elements du panier

$item_ids= array_keys($_SESSION["panier"]);
$list=new Cart();

/*si aucun id, alors afficher tableau vide*/
if(empty($item_ids)){
    $products = array();
}else{
    $products=$db->query('SELECT * FROM matable WHERE id IN ('.implode(',',$item_ids).')');
    $var_item = array();

    $total=0;

    foreach ($products as $product){
        $item=new Item();
            $item->setName($product->name);
            $item->setPrice($product->price);
            $item->setQuantity($_SESSION['panier'][$product->id]);

        $list->addProduct($item);
        $total +=$product->price*$_SESSION['panier'][$product->id];

    }

    // var_dump($list);

    //Dans cette partie on définis le prix total du panier
    //y compris les frais de livaisson
    $amount=new Amount();
    $amount->setCurrency('FCFA');
        $amount->setSubtotal($total);
        $amount->setTax(0);
        $amount->setFrais(1000);



    //add description data
    $description=new Description();
    $description->setDescribe('Achat en ligne');


//add config data
    $config=new Config();
    $config->setMode('live');
    $config->setUrlReturn('www.am');
    $config->setUrlSuccess('www.fal');
    $config->setIntent('sale');

//add credential
    $credential=new Credential();
    $credential->setAppKey("d94b55d9017bf133d0ef7ea4a39a2fd8d1ced9b5c84eb2ddbc9fe787d32b6ef7");
    $credential->setServerKey("2abd2ef0781dba47e21dcee51aa8fdcb1ba8d5879772303ad72a84fe5e5c360f");



    //Utilisation de l'interface gandokintché
    try{
        $context=new Context();

        //la methode permettant de creer le paiement
        $context->create($credential,$list->getProducts(),$amount,$description,$config);
    }catch (Exception $ex){

    }


}




