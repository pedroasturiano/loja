<?php
class pedidosController extends controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
        $dados = array();
        
        if(isset($_SESSION['cliente'])&& !empty($_SESSION['cliente'])){
            
            $dados['pedidos'] = array();
            
            $vendas = new vendas();
            $dados['pedidos'] = $vendas->getPedidosDoUsuario($_SESSION['cliente']);
            
            
            $this->loadTemplate("pedidos", $dados);

        } else {
            header("Location: /login");
        }
    }
        public function ver($id){
            
            if(!empty($id)){
                $dados = array();
                
                $id = addslashes($id);
                
                if(!empty($id)){
              
               $sql = "SELECT * FROM vendas WHERE id = '$id' AND id_usuario = '".($_SESSION['cliente'])."'"; 
               $sql = $this->db->query($sql);
               
               if($sql->rowCount()> 0){
                   $dados['pedido'] = $sql->fetch();
                   
                   $this->loadTemplate("pedidos_ver", $dados);
               }else{
                    header("Location: /pedidos");
               }
             
            } else {
                header("Location: /pedidos");
            }
            
        }
    }
}
