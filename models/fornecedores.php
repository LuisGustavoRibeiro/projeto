<?php
class fornecedores extends model {

	private $usuarioInfomacoes;

	//Verifica se a sessão está setada e não está vazia
	public function logado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			return true;
		} else {
			return false;
		}
	} // logado
	
	public function obterLista($id_empresa){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM fornecedores WHERE id_empresa = :id_empresa");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function adicionar(
					$id_empresa
					, $razao_social
					, $nome_fantasia
					, $cnpj
					, $endereco
					, $bairro
					, $numero
					, $cidade
					, $estado
					, $cep
					, $telefone
					, $celular
					, $email
					, $descricao){

						$id_fornecedor = "";

						$sql = $this->db->prepare("INSERT INTO 
														fornecedores
													SET 
														id_empresa = :id_empresa
														, razao_social = :razao_social
														, nome_fantasia = :nome_fantasia
														, cnpj = :cnpj
														, endereco = :endereco
														, bairro = :bairro
														, numero = :numero
														, cidade = :cidade
														, estado = :estado
														, cep = :cep
														, telefone = :telefone
														, celular = :celular
														, email = :email
														, descricao = :descricao");

						$sql->bindValue(":id_empresa", $id_empresa);
						$sql->bindValue(":razao_social", $razao_social);
						$sql->bindValue(":nome_fantasia", $nome_fantasia);
						$sql->bindValue(":cnpj", $cnpj);
						$sql->bindValue(":endereco", $endereco);
						$sql->bindValue(":bairro", $bairro);
						$sql->bindValue(":numero", $numero);
						$sql->bindValue(":cidade", $cidade);
						$sql->bindValue(":estado", $estado);
						$sql->bindValue(":cep", $cep);
						$sql->bindValue(":telefone", $telefone);
						$sql->bindValue(":celular", $celular);
						$sql->bindValue(":email", $email);
						$sql->bindValue(":descricao", $descricao);

						if($sql->execute()){
							$id_fornecedor = $this->db->lastInsertId();
						}

					} //adicionar

	public function obterUsuarioModal($id_fornecedor, $id_empresa){

		$array = array();

		$sql = $this->db->prepare(
				"SELECT 
					* 
				FROM 
					fornecedores 
				WHERE 
					id_fornecedor = :id_fornecedor 
					AND id_empresa = :id_empresa");
		$sql->bindValue(":id_fornecedor", $id_fornecedor);
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	} // obter usuario modal

	public function atualizar(
						$id_fornecedor
						, $razao_social
						, $nome_fantasia
						, $cnpj
						, $endereco					
						, $numero
						, $bairro
						, $cidade
						, $estado
						, $cep
						, $telefone
						, $celular
						, $email
						, $descricao){

			$sql = $this->db->prepare("UPDATE 
											fornecedores
										SET 											
											 razao_social = :razao_social
											, nome_fantasia = :nome_fantasia
											, cnpj = :cnpj
											, endereco = :endereco
											, bairro = :bairro
											, numero = :numero
											, cidade = :cidade
											, estado = :estado
											, cep = :cep
											, telefone = :telefone
											, celular = :celular
											, email = :email
											, descricao = :descricao
										WHERE 
											id_fornecedor = :id_fornecedor");

			$sql->bindValue(":id_fornecedor", $id_fornecedor);
			$sql->bindValue(":razao_social", $razao_social);
			$sql->bindValue(":nome_fantasia", $nome_fantasia);
			$sql->bindValue(":cnpj", $cnpj);
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":bairro", $bairro);
			$sql->bindValue(":numero", $numero);
			$sql->bindValue(":cidade", $cidade);
			$sql->bindValue(":estado", $estado);
			$sql->bindValue(":cep", $cep);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":celular", $celular);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":descricao", $descricao);

			$sql->execute();

		} //atualizar

		public function deletar($id_fornecedor){
		
			$sql = $this->db->prepare("DELETE FROM fornecedores WHERE id_fornecedor = :id_fornecedor");
			$sql->bindValue(":id_fornecedor", $id_fornecedor);
			$sql->execute();
		} // deletar

		// Esse select está não sendo usado -> aguardando solução: Plugin select2
		// O json retorna mais não exibe os resultados na tela -> select
		// public function select($param){
		// 	$array = array();

		// 	$sql = $this->db->prepare("SELECT id_fornecedor, nome_fantasia FROM fornecedores WHERE nome_fantasia LIKE :nome_fantasia ");
		// 	$sql->bindValue(":nome_fantasia", '%'.$param['term'].'%');
		// 	$sql->execute();

		// 	if($sql->rowCount() > 0){
		// 		$array = $sql->fetchAll();
		// 	}

		// 	return $array;
		// } // select 

		public function getFornecedores($id_empresa){
			$array = array();
			$sql = $this->db->prepare("SELECT id_fornecedor, nome_fantasia FROM fornecedores WHERE id_empresa = :id_empresa");	
			$sql->bindValue(":id_empresa", $id_empresa);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			}

			return $array;
		}

    
}// fim