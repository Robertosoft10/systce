<?php
include_once 'class.conexao.php';
include_once '../Modell/class.estudante.php';

class CRUDEstud{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	

	public function insertProf(Estud $estud){
			$nome_estud 	= $estud->getNome_estud();
			$fone_estud		= $estud->getFone_estud();
            $respo_estud 	= $estud->getRespo_estud();
			$fone_resp 		= $estud->getFone_resp();
            $endereco_estud = $estud->getEndereco_estud();
            $cidade_estud   = $estud->getCidade_estud();
            $foto_estud 	= $estud->getFoto_estud();

			if(isset($_FILES['foto_estud'])){
				$extensao = strtolower(substr($_FILES['foto_estud']['name'], -4));
				$novoNome = sha1(time()) . $extensao;
				$diretorio = "../Images/estudante/";
				move_uploaded_file($_FILES['foto_estud']['tmp_name'], $diretorio.$novoNome);

			$sql = "INSERT INTO tb_estudantes (
				id_estud,
                nome_estud,
                fone_estud,
                respo_estud,
                fone_resp,
                endereco_estud,
                cidade_estud,
                foto_estud) 
				VALUES (null,
                '$nome_estud',
                '$fone_estud',
                '$respo_estud',
                '$fone_resp',
                '$endereco_estud', 
                '$cidade_estud',
				'$novoNome')";
		$this->conexao->executarQuery($sql);
		}
	}
	public function listEstud() {
        $consult = $this->conexao->executarQuery("SELECT * FROM tb_estudantes");
        $arrayObjetos = array();
        while($row = mysqli_fetch_array($consult)){
		$estud = new Estud(
				$row['id_estud'], 
				$row['nome_estud'], 
				$row['fone_estud'],
                $row['respo_estud'],
				$row['fone_resp'], 
                $row['endereco_estud'],
                $row['cidade_estud'],
                $row['foto_estud']);
        array_push($arrayObjetos, $estud);
        }
        return $arrayObjetos;
	}
	public function serchEstud($id_estud) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_estudantes WHERE id_estud='$id_estud'");
	$estud = new Estud(
				$row['id_estud'], 
				$row['nome_estud'], 
				$row['fone_estud'],
                $row['respo_estud'],
				$row['fone_resp'], 
				$row['endereco_estud'],
                $row['cidade_estud'],
				$row['foto_estud']);
        return $estud;
    $this->conexao->executarQuery($sql);
	}
	public function updateEstud(Estud $estud){
				$id_estud 		= $estud->getId_estud();
				$nome_estud 	= $estud->getNome_estud();
				$fone_estud		= $estud->getFone_estud();
                $respo_estud	= $estud->getRespo_estud();
				$fone_resp 		= $estud->getFone_resp();
				$endereco_estud = $estud->getEndereco_estud();
                $cidade_estud   = $estud->getCidade_estud();

				$sql = "UPDATE tb_estudantes SET 
				nome_estud='$nome_estud', 
				fone_estud='$fone_estud',
                respo_estud='$respo_estud',
				fone_resp='$fone_resp', 
				endereco_estud='$endereco_estud',
                cidade_estud='$cidade_estud'
				WHERE id_estud ='$id_estud'";
	$this->conexao->executarQuery($sql);
		}
	public function deleteEstud($id_estud) {
			$sql = "DELETE FROM tb_estudantes WHERE id_estud='$id_estud'";
			$this->conexao->executarQuery($sql);
		}
}

?>