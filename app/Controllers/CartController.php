<?php

class CartController extends CoreController{
    
    public function cart() {

        $cart = new Cart();
        $assign_to_view = [
            'array_products' => $cart->getProducts(),
        ];
        $this->show('cart', $assign_to_view);
    }

    /**
     * Méthode d'ajout au panier
     */
    public function add() {
        //J'ajoute mon produit au panier
        //Je récupère l'id du produit et sa quantité ajouté
        //mais je vérifie les données avant
        //Si le champ existe bien
        if(!isset($_POST['product_id']) || !isset($_POST['product_qty'])) {
            header('Location: ' . $this->baseUrl . '/mon-panier');
        }
        $product_id = $_POST['product_id'];
        $product_qty = $_POST['product_qty'];
        //si l'utilisateur modifie mon formulaire d'jout au panier
        if(empty($product_id) || $product_qty <= 0) {
            header('Location: ' . $this->baseUrl . '/mon-panier');
        }
        //Je crée une nouvelle instance de ma classe Cart qui me permet de manipuler le panier dans ma session
        $cart = new Cart();
        $product = $this->dbData->getProductDetails($product_id);
        //Si l'id envoyé ne correspond pas à un produit en BDD
        if(empty($product)) {
            header('Location: ' . $this->baseUrl . '/mon-panier');
        }
        $cart->addProduct($product, $product_qty);

        //Après je redirige vers la page 'mon-panier'
        header('Location: ' . $this->baseUrl . '/mon-panier');
    }


    public function update() {
        //Je modifie mon panier


        //Après je redirige vers la page 'mon-panier'
        header('Location: ' . $this->baseUrl . '/mon-panier');
    }


    public function delete($params) {
        //Je supprime un produit de mon panier

        
        //Après je redirige vers la page 'mon-panier'
        header('Location: ' . $this->baseUrl . '/mon-panier');
    }
    

}