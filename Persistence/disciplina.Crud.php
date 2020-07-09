<?php
include_once 'class.conexao.php';
include_once '../Modell/class.disciplina.php';

class CRUDDiscip{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	
	
	public function insertDiscip(Discip $discip){
			$nome_discip		= $discip->getNome_discip();
			$hora_discip 		= $discip->getHora_discip();

			$sql = "INSERT INTO tb_disciplinas (
                id_discip, 
				nome_discip, 
				hora_discip) 
				VALUES (null, 
			    '$nome_discip',
                '$hora_discip')";
		$this->conexao->executarQuery($sql);
		}
	public function listDiscip() {
        $consult = $this->conexao->executarQuery("SELECT * FROM tb_disciplinas");
        $arrayObjetos = array();
        while($row = mysqli_fetch_array($consult)){
		$discip = new Discip(
				$row['id_discip'], 
				$row['nome_discip'], 
				$row['hora_discip']);
        array_push($arrayObjetos, $discip);
        }
        return $arrayObjetos;
	}
	public function serchDiscip($id_discip) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_disciplinas WHERE id_discip='$id_discip'");
	$discip = new Discip(
        $row['id_discip'], 
        $row['nome_discip'], 
        $row['hora_discip']);
    return $discip;
    $this->conexao->executarQuery($sql);
	}
	public function updateDiscip(Discip $discip) {
			$id_discip 			= $discip->getId_discip();
            $nome_discip		= $discip->getNome_discip();
			$hora_discip 		= $discip->getHora_discip();

			$sql = "UPDATE tb_disciplinas SET 
			nome_discip='$nome_discip', 
			hora_discip='$hora_discip'
			WHERE id_discip ='$id_discip'";
		$this->conexao->executarQuery($sql);
		}
	public function deleteDiscip($id_discip) {
			$sql = "DELETE FROM tb_disciplinas WHERE id_discip='$id_discip'";
			$this->conexao->executarQuery($sql);
		}
}

?>