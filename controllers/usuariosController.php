<?php
class usuariosController extends controller {

    public function __construct() {
        parent::__construct();

        //Verifica se o usuário está logado
        $usuario = new usuarios();
        if($usuario->logado() == false){
            header("Location: ".BASE_URL."/login");
        }
    }

    public function index() {
    	$dados = array();

    	//Informações do usuário
        $usuario = new usuarios();
        $usuario->SetarUsuarioLogado();
        $empresa = new empresas($usuario->usuarioEmpresa());
        $dados['empresa_nome'] = $empresa->obterNomeEmpresa();
        $dados['usuario_nome'] = $usuario->obterNomeUsuario();
        $dados['id_usuario'] = $usuario->obterIdUsuario();
        $dados['id_empresa'] = $usuario->obterIdEmpresa();
        //Verificar acesso do menu
        $dados['menu_lista'] = $usuario->listarMenuDoUsuario($dados['id_usuario'], $dados['id_empresa']);

        //Lista dos Usuários cadastrados
        $dados['lista_usuarios'] = $usuario->obterLista($dados['id_empresa']);
    	
        $this->loadTemplate("usuarios", $dados);
    }

    public function exibir(){

        //Informações do usuário
        $usuario = new usuarios();
        $usuario->SetarUsuarioLogado();
        $empresa = new empresas($usuario->usuarioEmpresa());
        $dados['id_empresa'] = $usuario->obterIdEmpresa();

        //se vier algum id_usuario GET
        if(isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])){
            $id_usuario = addslashes($_GET['id_usuario']);
            $buscarUsuario = $usuario->obterUsuarioModal($id_usuario, $dados['id_empresa']);
            
            echo json_encode($buscarUsuario);
        }
    }// exibir

    public function adicionar() {
        $dados = array();
        
        //Informações do usuário
        $usuario = new usuarios();
        $usuario->SetarUsuarioLogado();
        $empresa = new empresas($usuario->usuarioEmpresa());
        $dados['empresa_nome'] = $empresa->obterNomeEmpresa();
        $dados['usuario_nome'] = $usuario->obterNomeUsuario();
        $dados['id_usuario'] = $usuario->obterIdUsuario();
        $dados['id_empresa'] = $usuario->obterIdEmpresa();
        //Verificar acesso do menu
        $dados['menu_lista'] = $usuario->listarMenuDoUsuario($dados['id_usuario'], $dados['id_empresa']);

        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes(utf8_decode($_POST['nome']));
            $dataNascimento = addslashes($_POST['dataNascimento']);
            $rg = addslashes($_POST['rg']);
            $cpf = addslashes($_POST['cpf']);
            $endereco = addslashes($_POST['endereco']);
            $numero = addslashes($_POST['numero']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $cep = addslashes($_POST['cep']);
            $complemento = addslashes($_POST['complemento']);
            $telefone = addslashes($_POST['telefone']);
            $celular = addslashes($_POST['celular']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $dados['id_usuario'] = $usuario->adicionar(
                $dados['id_empresa']
                , $nome
                , $dataNascimento
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
                , $senha
            );
    
            header("Location: ".BASE_URL."/usuarios");
        }

        $this->loadTemplate("addUsuario", $dados);
    } // adicionar

    public function atualizar(){
        $usuario = new usuarios();

        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $id_usuario = addslashes($_POST['id_usuario']);
            $nome = addslashes($_POST['nome']);
            $data_nascimento = addslashes($_POST['dataNascimento']);
            $rg = addslashes($_POST['rg']);
            $cpf = addslashes($_POST['cpf']);
            $endereco = addslashes($_POST['endereco']);
            $numero = addslashes($_POST['numero']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $cep = addslashes($_POST['cep']);
            $complemento = addslashes($_POST['complemento']);
            $telefone = addslashes($_POST['telefone']);
            $celular = addslashes($_POST['celular']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $usuario->atualizar($id_usuario, $nome, $data_nascimento, $rg, $cpf, $endereco, $numero, $bairro, $cidade, $estado, $cep, $complemento, $telefone, $celular, $email, $senha);

        }
    } // atualizar

    public function deletar(){
        if($_POST){
            $usuario = new usuarios();
            $id_usuario = addslashes($_POST['id_usuario']);
            $usuario->deletar($id_usuario);
        }
    } //deletar

}