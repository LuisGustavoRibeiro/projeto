<?php
class comprasController extends controller {

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

        $this->loadTemplate("compras", $dados);
    } // index

    public function adicionar(){
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

        //Select de fornecedores
        $fornecedores = new fornecedores();
        $dados['fornecedores'] = $fornecedores->getFornecedores($dados['id_empresa']);

        //Select de categorias
        $categorias = new categorias();
        $dados['categorias'] = $categorias->getCategorias($dados['id_empresa']);

        $this->loadTemplate("addCompra", $dados);
    } // adicionar

    // Pausa devido não retornar informação no select
    // public function selectFornecedores(){

    //     $param = $_GET['search'];

    //     $fornecedores = new fornecedores();
    //     $retorno = $fornecedores->select($param);

    //     $json = [];
    //     foreach($retorno as $dado){
    //         $json[] = ['id' => $dado['id_fornecedor'], 'nome' => $dado['nome_fantasia']];
    //     }

    //     echo json_encode($json);
    // } // selectFornecedores
}