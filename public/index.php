<?php

// Index.php est mon point d'entrée unique
//C'est lui qui viens instancier mon controller en fonction de mon url
//Ensuite c'est lui qui se charge d'éxécuter la méthode du controller
//Il fait donc correspondre une url à un couple Controller/Méthode : C'est le principe de la route
//Ce fichier est donc le FrontController !

//inclusion de l'autoload de composer
require __DIR__ .'/../vendor/autoload.php';

//inclusion des classes Controllers
require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/MainController.php';
require __DIR__.'/../app/Controllers/CatalogController.php';
require __DIR__.'/../app/Controllers/CartController.php';

//inclusions de nos models
require __DIR__.'/../app/Models/CoreModel.php';
require __DIR__.'/../app/Models/Brand.php';
require __DIR__.'/../app/Models/Category.php';
require __DIR__.'/../app/Models/Type.php';
require __DIR__.'/../app/Models/Product.php';

//inclusion de DBData
require __DIR__.'/../app/Utils/DBData.php';
require __DIR__.'/../app/Utils/Cart.php';

//On active le système de session au début du script pour chaque page
session_start();

//j'ai accès à la classe AltoRouter grâce à composer que j'utilise avec l'inclusion de l'autoload
//$router sera l'instance de AltoRouter
$router = new AltoRouter();

//Utilisation de la méthode setBasePath
//D'après la doc, elle permet de déclarer à AltoRouteur la partie statique de notre url
$baseUrl = isset($_SERVER['BASE_URI']) ? trim($_SERVER['BASE_URI']) : '/';
$router->setBasePath($baseUrl);

//Déclaration des routes à AltoRouter
//Via MainController
$router->map('GET', '/', ['MainController', 'home'], 'home');
$router->map('GET', '/mentions-legales', ['MainController', 'legalMentions'], 'legalMentions');
//Via CatalogueController
$router->map('GET', '/catalogue/categorie/[i:category_id]', ['CatalogController', 'category'], 'categoryDetails');
$router->map('GET', '/catalogue/type/[i:type_id]', ['CatalogController', 'type'], 'typeDetails');
$router->map('GET', '/catalogue/produit/[i:product_id]', ['CatalogController', 'product'], 'productDetails');
$router->map('GET', '/catalogue/brand/[i:brand_id]', ['CatalogController', 'brand'], 'brandDetails');
//Via CartController
$router->map('GET', '/mon-panier', ['CartController', 'cart'], 'cart');
$router->map('POST', '/ajout-panier/', ['CartController', 'add'], 'cartAdd');
$router->map('POST', '/modif-panier/', ['CartController', 'update'], 'cartUpdate');
$router->map('GET', '/supp-product-panier/[i:product_id]', ['CartController', 'delete'], 'cartDelete');

//match renvoi un array avec 3 paramètres, sinon false lorsque la route n'existe pas (donc 404)
$match = $router->match();
if($match) {
    //Si il y a correspondance
    //dump($match);
    /*détail $match :
    array(3) {
        ["target"] => array (
            0 => 'Nom du controller',
            1=> 'Nom de la méthode'
        )
        ["params"] => array(liste des paramètres)
        ["name] => 'Nom de la route'
    }*/
    //Je stock dans des variables les noms de mon controlleur et de la méthode déterminés
    $controllerName = $match["target"][0];
    $actionName = $match["target"][1];

    //PHP va remplacer $controllerName par sa valeur puis il va instancier la bonne classe
    //ex: $controller = new MainController
    $controller = new $controllerName($baseUrl);
    //PHP va remplacer $actionName par sa valeur puis il va appeler la bonne méthode
    //ex: $controller->home()
    $controller->$actionName($match['params']);
    
}
else{
    //sinon 404
    $controller = new MainController($baseUrl);
    $controller->notFound();
}



//Mise en place des notre système de routage avec des IF/else
//Méthode pas super ergo / pratique
/*if(empty($_GET['_url']) || $_GET['_url'] == '/home') {
    $controller = new MainController();
    $controller->home();

}
elseif ($_GET['_url'] == '/catalogue/produit') {
    $controller = new CatalogController();
    $controller->product();
}
elseif ($_GET['_url'] == '/catalogue/type') {
    $controller = new CatalogController();
    $controller->type();
}
elseif ($_GET['_url'] == '/catalogue/categorie') {
    $controller = new CatalogController();
    $controller->category();
}
else {
    $controller = new MainController();
    $controller->notFound();
}*/
?>