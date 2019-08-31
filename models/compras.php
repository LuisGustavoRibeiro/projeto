<?php
class compras extends model {

	private $usuarioInfomacoes;

	//Verifica se a sessão está setada e não está vazia
	public function logado(){
		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
			return true;
		} else {
			return false;
		}
    } // logado
    
}