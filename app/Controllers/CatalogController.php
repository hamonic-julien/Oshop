<?php

class CatalogController extends CoreController {
    public function product($params) {
        //J'éxécute la méthode getProductDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $myProduct = $this->dbData->getProductDetails($params['product_id']);
        //Si mon produit n'existe pas => méthode notFound héritée du CoreController = 404
        if(empty($myProduct)) {
            $this->notFound();
        }
        $myBrand = $this->dbData->getBrandDetails($myProduct->getBrand_Id());
        $myCategory = $this->dbData->getCategoryDetails($myProduct->getCategory_Id());
        $assign_to_view = [
            'product' => $myProduct,
            'brand' => $myBrand,
            'category' => $myCategory,
        ];
        $this->show('product', $assign_to_view);
        
    }
    public function type($params) {
        //J'éxécute la méthode getTypeDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $typeDetail = $this->dbData->getProductTypeDetails($params['type_id']);
        $assign_to_view = [
            'type' => $typeDetail,
        ];
        $this->show('type', $assign_to_view);    
    }
    public function category($params) {
        //J'éxécute la méthode getCategoryDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $categoryDetail = $this->dbData->getCategoryDetails($params['category_id']);
        $categoryProducts = $this->dbData->getCategoryProducts($params['category_id']);
        //J'éxécute la méthode getBrandDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $brandDetail = $this->dbData->getBrandDetails(7);
        //J'éxécute la méthode getProductTypeDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $typeDetail = $this->dbData->getProductTypeDetails(2);
        $assign_to_view = [
            'category' => $categoryDetail,
            'product' => $categoryProducts,
        ];
        $this->show('category', $assign_to_view);
        
    }

    public function brand($params) {
        //J'éxécute la méthode getTBrandDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $brandDetail = $this->dbData->getBrandDetails($params['brand_id']);
        $assign_to_view = [
            'brand' => $brandDetail,
        ];
        $this->show('brand', $assign_to_view);    
    }

}