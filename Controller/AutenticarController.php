<?php

    
    class AutenticarController extends Controller{
       
        public function __construct(){
            //chamando o construtor da classe mãe
            parent::__construct();
        }
        
        public function index(){
            self::logar();
        }
        
        public function logar(){
            $this->view->renderizar('admin/login');
        }
        
        public function auth(){
            $email = ( isset($_POST['email']) ) ? $_POST['email'] : null;
            $senha = ( isset($_POST['password']) ) ? $_POST['password'] : null;
            
            $auth = new AutenticarDAO();
            $validar = $auth->validar($email, $senha);
            
            var_dump($validar);
            
            if( $validar == null ){
                self::logar();
            }else{
                $_SESSION['logado'] = true;
                $_SESSION['id'] = $validar->getId(); 
            }
        }
    }
    ?>