<?php

    class AutenticarDAO {
        
        // Objeto de Conexao com o Banco de Dados
        private $con;
        public function __construct(){
            $this->con = new Mysqli('127.0.0.1', 'silvas_rosilene', '', 'intertravels');
            if ($this->con->connect_errno) {
                echo "<br><br>Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            
        }
        
        public function validar($email, $senha){
            
            require_once( __DIR__.'/UsuarioModel.php' );
            
            $stmt = $this->con->prepare("SELECT * FROM usuario WHERE email=? AND senha=? ");
            $stmt->bind_param("ss", $email, $senha);
            $stmt->execute();
            $stmt->bind_result($id,$nome, $email, $senha);
            $stmt->fetch();
            
            
                
            echo "<pre>";
            print_r($stmt);
            exit;
            
            if($stmt->num_rows > 0){
                
                $usuario = new Usuario($id,$nome,$email,$senha);
                return $usuario;
            }else{
                return null;
            }
        }
    }