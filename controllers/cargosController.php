<?php
    class cargosController extends controller {

        public function __construct() {
            parent::__construct();
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

            // Listar todos os cargos
            $cargos = new cargos(); 
            $dados['lista_cargos'] = $cargos->exibir($dados['id_empresa']);

            $this->loadTemplate("cargos", $dados);
        }

        public function obterCargo($id_cargo){

            //Informações do usuário
            $usuario = new usuarios();
            $usuario->SetarUsuarioLogado();
            $empresa = new empresas($usuario->usuarioEmpresa());
            $dados['id_empresa'] = $usuario->obterIdEmpresa();
            
            $cargos = new cargos(); 
            $retorno = $cargos->buscar($id_cargo);

            echo json_encode($retorno);
        }

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

            if(isset($_POST['cargo']) && !empty($_POST['cargo'])) {

                //Informações do usuário
                $usuario = new usuarios();
                $usuario->SetarUsuarioLogado();
                $empresa = new empresas($usuario->usuarioEmpresa());
                $dados['id_empresa'] = $usuario->obterIdEmpresa();

                //receber os dados
                $cargo = addslashes($_POST['cargo']);
                $descricao = addslashes($_POST['descricao']);

                // instanciar e guardar informação
                $cargos = new cargos(); 
                $retorno = $cargos->adicionar($dados['id_empresa'], $cargo, $descricao);

                header("Location: ".BASE_URL."/cargos");

            } // if post

            $this->loadTemplate("addCargo", $dados);
        } //adicionar

        public function atualizar(){
            if(isset($_POST['id_cargo']) && !empty($_POST['id_cargo'])){
                $id_cargo = addslashes($_POST['id_cargo']);
                $cargo = addslashes(utf8_decode($_POST['cargo']));
                $descricao = addslashes(utf8_decode($_POST['descricao']));

                $cargos = new cargos();
                $retorno = $cargos->atualizar($id_cargo, $cargo, $descricao);

                echo json_encode($retorno);
            }
        } // atualizar

        public function deletar(){
            if($_POST){
                $cargos = new cargos();
                $id_cargo = addslashes($_POST['id_cargo']);
                $cargos->deletar($id_cargo);
            }
        }
}