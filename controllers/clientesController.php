<?php
class clientesController extends controller {

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
        $clientes = new clientes();
        $dados['lista_clientes'] = $clientes->obterLista($dados['id_empresa']);
    	
        $this->loadTemplate("clientes", $dados);
    } // index


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

        $clientes = new clientes();

        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes(utf8_decode($_POST['nome']));
            $dataNascimento = addslashes($_POST['dataNascimento']);
            $sexo = addslashes($_POST['sexo']);
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
            $descricao = addslashes($_POST['descricao']);

            $dados['id_cliente'] = $clientes->adicionar(
                $dados['id_empresa']
                , $nome
                , $dataNascimento
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
                , $descricao
            );
    
            header("Location: ".BASE_URL."/clientes");
        }

        $this->loadTemplate("addCliente", $dados);
    } // adicionar

    public function exibir(){

        //Informações do usuário
        $usuario = new usuarios();
        $usuario->SetarUsuarioLogado();
        $empresa = new empresas($usuario->usuarioEmpresa());
        $dados['id_empresa'] = $usuario->obterIdEmpresa();

        //instanciando a classe clientes
        $clientes = new clientes();

        //se vier algum id_usuario GET
        if(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])){
            $id_cliente = addslashes($_GET['id_cliente']);
            $retornoCliente = $clientes->obterUsuarioModal($id_cliente, $dados['id_empresa']);
            
            echo json_encode($retornoCliente);
        }
    }// exibir

    public function atualizar(){
        $cliente = new clientes();

        if(isset($_POST['id_cliente']) && !empty($_POST['id_cliente'])){
            $id_cliente = addslashes($_POST['id_cliente']);
            $nome = addslashes(utf8_decode($_POST['nome']));
            $data_nascimento = addslashes($_POST['dataNascimento']);
            $sexo = addslashes($_POST['sexo']);
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
            $descricao = addslashes($_POST['descricao']);

            $cliente->atualizar($id_cliente, $nome, $data_nascimento, $sexo, $cpf, $endereco, $numero, $bairro, $cidade, $estado, $cep, $complemento, $telefone, $celular, $email, $descricao);
        }
    } // atualizar

    public function deletar(){
        if($_POST){
            $cliente = new clientes();
            $id_cliente = addslashes($_POST['id_cliente']);
            $cliente->deletar($id_cliente);
        }
    } //deletar


}