<?php
class clientes extends model {

	private $usuarioInfomacoes;

	//Verifica se a sessão está setada e não está vazia
	public function logado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			return true;
		} else {
			return false;
		}
    }

    public function obterLista($id_empresa){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM clientes WHERE id_empresa = :id_empresa");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
    } //obterLista
    
    public function adicionar(
                        $id_empresa
                        , $nome
                        , $data_nascimento
                        , $cpf
                        , $endereco
                        , $numero
                        , $bairro
                        , $cidade
                        , $estado
                        , $cep
                        , $complemento
                        , $telefone
                        , $celular
                        , $email
                        , $descricao){

		$id_cliente = "";

		$sql = $this->db->prepare(
			"INSERT INTO 
				clientes
			SET 
				id_empresa = :id_empresa
				, nome = :nome
				, data_nascimento = :data_nascimento
				, cpf = :cpf
				, endereco = :endereco
				, numero = :numero
				, bairro = :bairro
				, cidade = :cidade
				, estado = :estado
				, cep = :cep
				, complemento = :complemento
				, telefone = :telefone
				, celular = :celular
                , email = :email
                , descricao = :descricao"
		);
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":data_nascimento", $data_nascimento);	
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":numero", $numero);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":complemento", $complemento);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":descricao", $descricao);

		echo $sql; exit;

		if($sql->execute()){
			$id_cliente = $this->db->lastInsertId();
		}

		return $id_cliente;
	} // function adicionar

	public function obterUsuarioModal($id_cliente, $id_empresa){

		$array = array();

		$sql = $this->db->prepare(
				"SELECT 
					* 
				FROM 
					clientes 
				WHERE 
					id_cliente = :id_cliente 
					AND id_empresa = :id_empresa");
		$sql->bindValue(":id_cliente", $id_cliente);
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	} // obter cliente modal

	public function atualizar(
						$id_cliente
						, $nome
						, $data_nascimento
						, $sexo
						, $cpf
						, $endereco
						, $numero
						, $bairro
						, $cidade
						, $estado
						, $cep
						, $complemento
						, $telefone
						, $celular
						, $email
						, $descricao){
		$sql = $this->db->prepare(
			"UPDATE
				clientes
			SET 
				 nome = :nome
				, data_nascimento = :data_nascimento
				, sexo = :sexo
				, cpf = :cpf
				, endereco = :endereco				
				, numero = :numero
				, bairro = :bairro
				, cidade = :cidade
				, estado = :estado
				, cep = :cep
				, complemento = :complemento
				, telefone = :telefone
				, celular = :celular
                , email = :email
				, descricao = :descricao
			WHERE 
				id_cliente = :id_cliente"
		);
		$sql->bindValue(":id_cliente", $id_cliente);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":data_nascimento", $data_nascimento);	
		$sql->bindValue(":sexo", $sexo);	
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":numero", $numero);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":complemento", $complemento);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":descricao", $descricao);

		$sql->execute();
	} // atualizar

	public function deletar($id_cliente){
		
		$sql = $this->db->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
		$sql->bindValue(":id_cliente", $id_cliente);
		$sql->execute();
	} // deletar
}
    