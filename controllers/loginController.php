<?php 
    class loginController extends controller {

        public function index(){
            $dados = array();

            if(isset($_POST['email']) && !empty($_POST['email'])){
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                $usuario = new usuarios();

                if($usuario->login($email, $senha)){
                    header("Location: ".BASE_URL);
                    exit;
                } else {
                    $dados['error'] = 'Email ou Senha incorretos!';
                }
            }

            $this->loadView('login', $dados);
        }

        public function logout(){
            $usuario = new usuarios();
            $usuario->logout();

            header("Location: ".BASE_URL);
        }
    }