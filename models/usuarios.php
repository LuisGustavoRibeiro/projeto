<?php
class usuarios extends model {

	private $usuarioInfomacoes;

	//Verifica se a sessão está setada e não está vazia
	public function logado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			return true;
		} else {
			return false;
		}
	}

	public function login($mail, $senha){

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(':email', $mail);
		$sql->bindValue(':senha', $senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			$row = $sql->fetch();

			$_SESSION['usuario'] = $row['id_usuario'];
			return true;
		} else {
			return false;
		}
	}

	public function logout(){
		unset($_SESSION['usuario']);
	}

	public function listarMenuDoUsuario($id_usuario, $id_empresa){

			$sql = $this->db->prepare("SELECT id_empresa, id_usuario, me.id_menu AS id_menu , m.nome AS nome, m.link AS link, classe FROM menu_empresas me INNER JOIN menus  m ON me.id_menu = m.id_menu INNER JOIN icones i ON i.id_icone = m.id_icone	WHERE id_empresa = :id_empresa AND id_usuario = :id_usuario");
			$sql->bindValue(':id_usuario', $id_usuario);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->execute();

			if($sql->rowCount() > 0){
				return $this->usuarioInfomacoes = $sql->fetchAll();
				// echo "<pre>";
				// print_r($dados);exit;
				// echo "<pre>";
			}
	}

	public function SetarUsuarioLogado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			$id_usuario = $_SESSION['usuario'];

			$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = :id_usuario");
			$sql->bindValue(':id_usuario', $id_usuario);
			$sql->execute();

			if($sql->rowCount() > 0){
				$this->usuarioInfomacoes = $sql->fetch();
			}
		}
	}

	public function usuarioEmpresa(){
		if(isset($this->usuarioInfomacoes['id_empresa'])){
			return $this->usuarioInfomacoes['id_empresa'];
		} else {
			return 0;
		}
	}

	public function obterNomeUsuario(){
		if(isset($this->usuarioInfomacoes['nome'])){
			return $this->usuarioInfomacoes['nome'];
		} else {
			return '';
		}
	}

	public function obterIdUsuario(){
		if(isset($this->usuarioInfomacoes['id_usuario'])){
			return $this->usuarioInfomacoes['id_usuario'];
		} else {
			return '';
		}
	}

	public function obterIdEmpresa(){
		if(isset($this->usuarioInfomacoes['id_empresa'])){
			return $this->usuarioInfomacoes['id_empresa'];
		} else {
			return '';
		}
	}

	public function obterLista($id_empresa){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id_empresa = :id_empresa");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function adicionar($id_empresa, $nome, $data_nascimento, $rg, $cpf, $endereco, $numero, $bairro, $cidade, $estado, $cep, $complemento, $telefone, $celular, $email, $senha){

		$id_usuario = "";

		$sql = $this->db->prepare(
			"INSERT INTO 
				usuarios
			SET 
				id_empresa = :id_empresa
				, nome = :nome
				, data_nascimento = :data_nascimento
				, rg = :rg
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
				, senha = :senha"
		);
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":data_nascimento", $data_nascimento);
		$sql->bindValue(":rg", $rg);
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
		$sql->bindValue(":senha", $senha);

		if($sql->execute()){
			$id_usuario = $this->db->lastInsertId();
		}

		return $id_usuario;
	} // function adicionar

	public function obterUsuarioModal($id_usuario, $id_empresa){

		$array = array();

		$sql = $this->db->prepare(
				"SELECT 
					* 
				FROM 
					usuarios 
				WHERE 
					id_usuario = :id_usuario 
					AND id_empresa = :id_empresa");
		$sql->bindValue(":id_usuario", $id_usuario);
		$sql->bindValue(":id_empresa", $id_empresa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	} // obter usuario modal

	public function atualizar(
			$id_usuario
			, $nome
			, $data_nascimento
			, $rg
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
			, $senha){
		$sql = $this->db->prepare(
				"UPDATE 
					usuarios 
				SET 
					nome = :nome
					, data_nascimento = :data_nascimento
					, rg = :rg
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
					, senha  = :senha 
				WHERE 
					id_usuario = :id_usuario");

		$sql->bindValue(":id_usuario", $id_usuario);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":data_nascimento", $data_nascimento);
		$sql->bindValue(":rg", $rg);
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
		$sql->bindValue(":senha", $senha);

		$sql->execute();
	} // atualizar

	public function deletar($id_usuario){
		
		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_usuario", $id_usuario);
		$sql->execute();
	} // deletar
}