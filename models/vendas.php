<?php
class vendas extends model {

	public function __construct() {
		parent::__construct();
	}
        
        public function getPedido($id, $id_usuario){
            $array = array();   
            
            $sql = "SELECT *, (select pagamentos.nome from pagamentos where pagamentos.id = vendas.forma_pg) as tipopgto FROM vendas WHERE id_usuario = '$id_usuario'";
            $sql = $this->db->query($sql);
         
            if($sql->rowCount()> 0){
                $array = $sql->fetch();
                   
                $array['produtos'] = $this->getProdutosDoPedidos($id);
               }
               return $array;
        }
        
        public function getProdutosDoPedidos($id){
            $array = array();
            
            $sql = "SELECT 
                    vendas_produtos.quantidade,
                    vendas_produtos.id_produto,
                    produtos.nome,
                    produtos.imagem,
                    produtos.preco
                FROM vendas_produtos
                LEFT JOIN produtos ON vendas_produtos.id_produto =
                      produtos.id
                WHERE vendas_produtos.id_venda = '$id'";
            $sql = $this->db->query($sql);
            
             if($sql->rowCount()> 0){
                $array = $sql->fetch();
                   
                $array['produtos'] = $this->getProdutosDoPedidos($id);
               }
        }


        public function getPedidosDoUsuario($id_usuario){
            $array = array();
            
            if(!empty($id_usuario)){
              
               $sql = "SELECT *, (select pagamentos.nome from pagamentos where pagamentos.id = vendas.forma_pg) as tipopgto FROM vendas WHERE id_usuario = '$id_usuario'"; 
               $sql = $this->db->query($sql);
               
               if($sql->rowCount()> 0){
                   $array = $sql->fetchAll();
               }
            }
            return $array;
        }
        
       

        public function setVenda($uid, $endereco, $valor, $pg, $prods) {

		/*
		1 => Aguardando Pgto.
		2 => Aprovado
		3 => Cancelado
		*/
		$status = '1';
		$link = '';
                
                $sql = "INSERT INTO vendas SET id_usuario = '$uid', endereco = '$endereco', valor = '$valor', forma_pg = '$pg', status_pg = '$status', pg_link = '$link'";
		$this->db->query($sql);

		$id_venda = $this->db->lastInsertId();

		if($pg == '1') {
			$status = '2';
			$link = '/carrinho/obrigado';
                        
                        $this->db->query("UPDATE vendas SET status_pg = '$status' WHERE id = '".$id_venda."'");
                        
		} elseif($pg = '2') {
                        //pagseguro
			require 'libraries/PagSeguroLibrary/PagSeguroLibrary.php';
                        $paymentRequest = new PagSeguroPaymentRequest();
                        foreach($prods as $prod) {
                            $paymentRequest->addItem($prod['id'], $prod['nome'], 1, $prod['preco']);
                        }
                        $paymentRequest->setCurrency("BRL");
                        $paymentRequest->setReference($id_venda);
                        $paymentRequest->setRedirectUrl("http://loja.pc:88/carrinho/obrigado");
                        $paymentRequest->addParameter("notificationURL","http://loja.pc:88/carrinho/notificacao");
                        
                        try {
                            
                            $cred = PagSeguroConfig::getAccountCredentials();
                            $link = $paymentRequest->register($cred);
                            
                        } catch (PagSeguroServiceException $e) {
                            
                            echo $e->getMessage();
                            
                        }



		}

		foreach($prods as $prod) {
			$sql = "INSERT INTO vendas_produtos SET id_venda = '$id_venda', id_produto = '".($prod['id'])."', quantidade = '1'";
			$this->db->query($sql);
		}

		unset($_SESSION['carrinho']);

		return $link;

	}

}