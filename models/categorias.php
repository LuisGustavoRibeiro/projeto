<?php
class categorias extends model {

	private $usuarioInfomacoes;

	//Verifica se a sessão está setada e não está vazia
	public function logado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			return true;
		} else {
			return false;
		}
	}
	
	public function getCategorias($id_empresa){
		$array = array();
		
		$sql = $this->db->prepare("SELECT id_categoria_produto, id_empresa, categoria_nome FROM categorias WHERE id_empresa = :id_empresa");
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
} // fim