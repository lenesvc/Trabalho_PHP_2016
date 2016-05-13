<?php

class App{
    //VEM DA URL
    private $met, $clazz;
    
    /**
     *  Parametros recuperaos da url 
     *  $met = metodo a ser acessado
     *  $clazz = controller a ser acessado
     */
    public function __construct($met,$clazz){
        $this->met = $met;
        $this->clazz = $clazz;
    }
    
    /**
     *  Metodo que faz o MVC funcionar
     */
    public function startApp(){
        $clazzName = ucfirst($this->clazz) . "Controller";
        $modelName = ucfirst($this->clazz) . "Model";
        require_once "Model/" . $modelName . ".php";
        require_once "Model/" . ucfirst($this->clazz) . "DAO.php";
        require_once "Controller/Controller.php";
        require_once "Controller/" . $clazzName . ".php";
        
        $hc = new $clazzName();
        $met = $this->met;
        $hc->$met();
    }
}

session_start();
require_once "View/View.php";

$met = $_GET["metodo"];
$clazz = $_GET["classe"];
$r = new App($met,$clazz);
$r->startApp();

?>