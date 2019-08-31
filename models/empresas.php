<?php 
    class empresas extends model {

        private $empresaInformacoes;

        public function __construct($id_empresa){
            parent::__construct();

            $sql = $this->db->prepare("SELECT * FROM empresas WHERE id_empresa = :id_empresa");
            $sql->bindValue(':id_empresa', $id_empresa);
            $sql->execute();

            if($sql->rowCount() > 0){
                $this->empresaInformacoes = $sql->fetch();
            }
        }

        public function obterNomeEmpresa(){
            if(isset($this->empresaInformacoes['nome'])){
                return $this->empresaInformacoes['nome'];
            } else {
                return '';
            }
        }
    }