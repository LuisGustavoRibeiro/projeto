<?php
class fornecedoresController extends controller {

    public function __construct() {
        parent::__construct();

        //Verifica se o usuário está logado
        $usuario = new usuarios();
        if($usuario->logado() == false){
            header("Location: ".BASE_URL."/login");
        }
    }

    public function index(){
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
        $fornecedores = new fornecedores();
        $dados['lista_fornecedores'] = $fornecedores->obterLista($dados['id_empresa']);

        $this->loadTemplate("fornecedores", $dados);
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

        $fornecedores = new fornecedores();

        if(isset($_POST['razaoSocial']) && !empty($_POST['razaoSocial'])){
            $razao_social = addslashes(utf8_decode($_POST['razaoSocial']));
            $nome_fantasia = addslashes($_POST['nomeFantasia']);
            $cnpj = addslashes($_POST['cnpj']);
            $endereco = addslashes($_POST['endereco']);
            $numero = addslashes($_POST['numero']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $cep = addslashes($_POST['cep']);
            $telefone = addslashes($_POST['telefone']);
            $celular = addslashes($_POST['celular']);
            $email = addslashes($_POST['email']);
            $descricao = addslashes($_POST['descricao']);

            $dados['id_fornecedor'] = $fornecedores->adicionar(
                $dados['id_empresa']
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
                , $descricao
            );
    
            header("Location: ".BASE_URL."/fornecedores");
        }

        $this->loadTemplate("addFornecedor", $dados);
    } // adicionar

    public function exibir(){

        //Informações do usuário
        $usuario = new usuarios();
        $usuario->SetarUsuarioLogado();
        $empresa = new empresas($usuario->usuarioEmpresa());
        $dados['id_empresa'] = $usuario->obterIdEmpresa();
        $fornecedores = new fornecedores();

        //se vier algum id_usuario GET
        if(isset($_GET['id_fornecedor']) && !empty($_GET['id_fornecedor'])){
            $id_fornecedor = addslashes($_GET['id_fornecedor']);
            $buscarFornecedor = $fornecedores->obterUsuarioModal($id_fornecedor, $dados['id_empresa']);
            
            echo json_encode($buscarFornecedor);
        }
    }// exibir

    public function atualizar(){
        $fornecedores = new fornecedores();

        if(isset($_POST['razaoSocial']) && !empty($_POST['razaoSocial'])){
            $id_fornecedor = addslashes($_POST['id_fornecedor']);
            $razao_social = addslashes($_POST['razaoSocial']);
            $nome_fantasia = addslashes($_POST['nomeFantasia']);            
            $cnpj = addslashes($_POST['cnpj']);
            $endereco = addslashes($_POST['endereco']);
            $numero = addslashes($_POST['numero']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $estado = addslashes($_POST['estado']);
            $cep = addslashes($_POST['cep']);
            $telefone = addslashes($_POST['telefone']);
            $celular = addslashes($_POST['celular']);
            $email = addslashes($_POST['email']);
            $descricao = addslashes($_POST['descricao']);

            $fornecedores->atualizar($id_fornecedor, $razao_social, $nome_fantasia, $cnpj, $endereco, $numero, $bairro, $cidade, $estado, $cep, $telefone, $celular, $email, $descricao);

        }
    } // atualizar

    public function deletar(){
        if($_POST){
            $fornecedores = new fornecedores();
            $id_fornecedor = addslashes($_POST['id_fornecedor']);
            $fornecedores->deletar($id_fornecedor);
        }
    } //deletar
}