<?php
//Puisque ma classe CoreControlle ne sera jamais instanciée directement
//je peux l'indiquer à PHP en faisant abstract class
abstract class CoreController {

    protected $dbData;
    protected $baseUrl;

    public function __construct($baseUrl) {
        //J'instancie DBData
        $this->dbData = new DBData();     
        $this->baseUrl = $baseUrl;
    }
    protected function notFound() {
        header("HTTP/1.0 404 Not Found"); //donne un status 404 à mon navigateur
        $this->show('tony-404');
    }
    protected function show($tpl_name, $array_argument = []) {
        //Fonction native permettant de dumper les variables déclarée et accessible là où je me trouve
        //dump(get_defined_vars());
        //variable qui contient les 5 Produits du footer
        $arrayFooterTypes = $this->dbData->getFooterProductTypes();
        //variable qui contient les 5 marques du footer
        $arrayFooterBrands = $this->dbData->getFooterBrands();
        //je parcours le tableau array_argument donné en paramètre
        //je souhaite recréer mes variables contenues dans mon tableau $array-argument
        //sous la forme 'nom variable' => valeur (car array_argument est un tableau bidimentionnel: valeur = array assoc)
        foreach ($array_argument as $argument_name => $argument_value) {
            $$argument_name = $argument_value; //peut s'écrire ${$argument_name}
            //$$ permet de déclarer une variable ayant le nom d'une variable ex: $var = tableau - $$var = $tableau
        }

       

        require __DIR__.'/../views/header.tpl.php';
        require __DIR__.'/../views/'.$tpl_name.'.tpl.php';
        require __DIR__.'/../views/footer.tpl.php';
    }
}