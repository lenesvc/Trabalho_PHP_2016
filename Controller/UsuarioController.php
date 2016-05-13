<?php

    
    class UsuarioController extends Controller{
       
       public function __construct(){
        //chamando o construtor da classe mãe
            parent::__construct();
        }
        
        public function oi(){
            $this->view->renderizar('admin/login');
        }
    }