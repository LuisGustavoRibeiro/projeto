<?php
class homeController extends controller {

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

     	$this->loadTemplate("inicio", $dados);
    }

}