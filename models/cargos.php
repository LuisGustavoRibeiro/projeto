<?php
    class cargos extends model {

    public function exibir($id_empresa){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM cargos WHERE id_empresa = :id_empresa");
        $sql->bindValue(":id_empresa", $id_empresa);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        
        return $array;
    } // exibir

    public function adicionar($id_empresa, $cargo, $descricao){
        $sql = $this->db->prepare(
                "INSERT INTO 
                    cargos 
                SET 
                    id_empresa = :id_empresa
                    , cargo = :cargo
                    , descricao = :descricao");
        $sql->bindValue(":id_empresa", $id_empresa);
        $sql->bindValue(":cargo", $cargo);
        $sql->bindValue(":descricao", $descricao);

        if($sql->execute()){
			return 1;
		}
    }

    public function buscar($id_cargo){

        $array = array();

        $sql = $this->db->prepare("SELECT * FROM cargos WHERE id_cargo = :id_cargo");
        $sql->bindValue(":id_cargo", $id_cargo);

        if($sql->execute()){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function atualizar($id_cargo, $cargo, $descricao){
        $sql = $this->db->prepare("UPDATE 
                                    cargos 
                                SET 
                                    cargo = :cargo
                                    , descricao = :descricao
                                WHERE 
                                    id_cargo = :id_cargo");
        $sql->bindValue(":id_cargo", $id_cargo);
        $sql->bindValue(":cargo", $cargo);
        $sql->bindValue(":descricao", $descricao);
        
        $sql->execute();
    } // atualizar

    public function deletar($id_cargo){
		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
		$sql->bindValue(":id_cargo", $id_cargo);
		$sql->execute();
	}


}