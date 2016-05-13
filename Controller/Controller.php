<?php

abstract class Controller{
    
    protected $view;
    
    public function __construct(){
        $this->view = new View();
    }
    /**
     *  vai para uma pagina errada caso o usuario digite um metodo errado! 
     */
    public function __call($function, $args){
        $this->view->renderizar('error/erro');
    }
    
    /**
     *  metodo padrao para todo controller  
     */
    abstract public function index();
}

?>