<?php

class MainController extends CoreController{

    public function home() {
        //J'éxécute la méthode getCategoryDetails 
        //Je lui donne en paramètre l'id du produit concerné
        $arrayCategoryHome = $this->dbData->getHomeCategories();
        //utilisation d'un tableau assoc pour donner une clé à la variable
        $assign_to_view = [
            'array_category' => $arrayCategoryHome,
        ];
        $this->show('home', $assign_to_view);    
    }
    
    public function legalMentions() {
        $this->show('legal-mentions');    
    }
    
}