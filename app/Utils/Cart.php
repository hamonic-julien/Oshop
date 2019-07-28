<?php

//Classe qui va me permettre de manipuler les données de mon panier en session

class Cart {
    private $items;

    /*
    $this->items = [
        1 => [
            'id' => 1,
            'quantity' => 2,
        ],
        3 => [
            'id' => 3,
            'quantity' => 1,
        ],
        4 => [
            'id' => 4,
            'quantity' => 1,
        ],
        8 => [
            'id' => 8,
            'quantity' => 5,
        ],
        ...
    ]

    Schema :
    id_produit = array (
        'id' => #id_produit,
        'qty' => #qty_produit
    )
    */

    public function __construct() {
        //récupérer les items dans le panier s'il y en avait de renseignés dans la session
        $this->items = [];
        $this->load();
    }

    /**
     * Charge le contenu du panier en session
     */
    public function load() {
        if(isset($_SESSION['cart'])) {
            $this->items = $_SESSION['cart'];
        }        
    }

    /**
     * Sauvegarde le contenu du panier en session
     */
    public function save() {
        $_SESSION['cart'] = $this->items;

    }

    /**
     * Ajoute un produit dans le panier
     */
    public function addProduct($productModel, $qty) {
        //Si le produit n'est pas disponible
        if($productModel->getStatus() != 1) {
            return false;
        }

        //Si je n'ai pas encore mon produit dans le panier
        if(!isset($this->items[$productModel->getId()])) {
            
            $this->items[$productModel->getId()] = [
                'id' => $productModel->getId(),
                'qty' => $qty,
            ];
        }
        //Si j'ai déjà le produit dans le panier, j'incrémente la qty
        else {
            $this->items[$productModel->getId()]['qty'] += $qty;
        }
    $this->save();    
    return true;
        
    }

    /**
     * Supprime un produit du panier
     */
    public function deleteProcuct($productModel) {

    }

    /**
     * Modifie la quantité dans le parnier
     */
    public function changeQty($productModel, $newQty) {

    }

    /**
     * Retourne la liste des produits dans le panier et leur qty
     * 
     */
    public function getProducts() {

        $dbData = new DBData();
        $array_products = [];
        foreach ($this->items as $item) {
            $array_products[] = $dbData->getProductDetails($item['id']);
        }
        return $array_products;
    }

    /**
     * Retourne le montant total du panier
     */
    public function getTotal() {

    }
}