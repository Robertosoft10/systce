<?php
include_once 'class.conexao.php';
include_once '../Modell/class.instituicao.php';

class CRUDInst{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	
	
	public function insertInst(Inst $inst){
                $nome_instituicao       = $inst->getNome_instituicao();
                $fone1_instituicao      = $inst->getFone1_instituicao();
                $fone2_instituicao      = $inst->getFone2_instituicao();   
                $email_instituicao      = $inst->getEmail_instituicao();
                $endereco_instituicao   = $inst->getEndereco_instituicao();
                $direcao_instituicao    = $inst->getDirecao_instituicao();
                $logo_instituicao       = $inst->getLogo_instituicao();
                $frase_instituicao      = $inst->getFrase_instituicao();

			if(isset($_FILES['logo_instituicao'])){
				$extensao = strtolower(substr($_FILES['logo_instituicao']['name'], -4));
				$novoNome = sha1(time()) . $extensao;
				$diretorio = "../Images/instituicao/";
				move_uploaded_file($_FILES['logo_instituicao']['tmp_name'], $diretorio.$novoNome);

			$sql = "INSERT INTO tb_instituicao (
				id_inst, 
				nome_instituicao,
                fone1_instituicao,
                fone2_instituicao,
                email_instituicao,
                endereco_instituicao,
                direcao_instituicao,
                logo_instituicao,
                frase_instituicao) 
				VALUES (null, 
				'$nome_instituicao',
                '$fone1_instituicao',
                '$fone2_instituicao',
                '$email_instituicao',
                '$endereco_instituicao',
                '$direcao_instituicao',
                '$novoNome',
                '$frase_instituicao') ";
		$this->conexao->executarQuery($sql);
		}
	}
	public function listInst() {
        $consult = $this->conexao->executarQuery("SELECT * FROM tb_instituicao");
        $arrayObjetos = array();
        while($row = mysqli_fetch_array($consult)){
		$inst = new Inst(
				$row['id_inst'], 
				$row['nome_instituicao'], 
				$row['fone1_instituicao'], 
				$row['fone2_instituicao'],
				$row['email_instituicao'], 
				$row['endereco_instituicao'], 
				$row['direcao_instituicao'], 
				$row['logo_instituicao'], 
				$row['frase_instituicao']);
        array_push($arrayObjetos, $inst);
        }
        return $arrayObjetos;
	}
	public function serchInst($id_inst) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_instituicao WHERE id_inst='$id_inst'");
	$inst = new Inst(
			    $row['id_inst'], 
				$row['nome_instituicao'], 
				$row['fone1_instituicao'], 
				$row['fone2_instituicao'],
				$row['email_instituicao'], 
				$row['endereco_instituicao'], 
				$row['direcao_instituicao'], 
				$row['logo_instituicao'], 
				$row['frase_instituicao']);
    return $inst;
    $this->conexao->executarQuery($sql);
	}
	public function updateInst(Inst $inst){
				$id_inst 		        = $inst->getId_inst();
				$nome_instituicao       = $inst->getNome_instituicao();
                $fone1_instituicao      = $inst->getFone1_instituicao();
                $fone2_instituicao      = $inst->getFone2_instituicao();   
                $email_instituicao      = $inst->getEmail_instituicao();
                $endereco_instituicao   = $inst->getEndereco_instituicao();
                $direcao_instituicao    = $inst->getDirecao_instituicao();
                $frase_instituicao      = $inst->getFrase_instituicao();
				$sql = "UPDATE tb_instituicao SET 
				nome_instituicao='$nome_instituicao', 
				fone1_instituicao='$fone1_instituicao', 
				fone2_instituicao='$fone2_instituicao', 
				email_instituicao='$email_instituicao',
				endereco_instituicao='$endereco_instituicao',
                direcao_instituicao='$direcao_instituicao',
                frase_instituicao='$frase_instituicao'
				WHERE id_inst ='$id_inst'";
	$this->conexao->executarQuery($sql);
		}
	public function deleteInst($id_inst) {
			$sql = "DELETE FROM tb_instituicao WHERE id_inst='$id_inst'";
			$this->conexao->executarQuery($sql);
		}
}

?>