<?php

class View{
    //O $pagina vai renderizar a pagina
    //determinado pelo controller
    
    // tema padrao do sistema/site
    private $tema;
    
    public function __construct(){
        // definindo o tema como padrao
        $this->tema = 'View/default/';
    }
    
    public function renderizar($pagina){
        require_once $this->tema . $pagina . ".php";
    }
    
    public function interpolar($pagina,$dado){
        require_once $this->tema . $pagina . ".php";
    }
    
}

?>