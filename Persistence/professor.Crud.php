<?php
include_once 'class.conexao.php';
include_once '../Modell/class.professor.php';

class CRUDProf{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	
	
	public function insertProf(Prof $prof){
			$nome_prof 		= $prof->getNome_prof();
			$fone_prof		= $prof->getFone_prof();
			$email_prof 	= $prof->getEmail_prof();
            $password    	= $prof->getPassword();
            $endereco_prof 	= $prof->getEndereco_prof();
            $foto_prof 	    = $prof->getFoto_prof();

			if(isset($_FILES['foto_prof'])){
				$extensao = strtolower(substr($_FILES['foto_prof']['name'], -4));
				$novoNome = sha1(time()) . $extensao;
				$diretorio = "../Images/professor/";
				move_uploaded_file($_FILES['foto_prof']['tmp_name'], $diretorio.$novoNome);

			$sql = "INSERT INTO tb_professores (
				id_prof, 
				nome_prof, 
				fone_prof, 
				email_prof,
                password,
                usertipo,
				endereco_prof, 
				foto_prof) 
				VALUES (null, 
				'$nome_prof', 
				'$fone_prof', 
				'$email_prof',
                '$password',
                2,
				'$endereco_prof', 
				'$novoNome')";
		$this->conexao->executarQuery($sql);
		}
	}
	public function listProf() {
        $consult = $this->conexao->executarQuery("SELECT * FROM tb_professores");
        $arrayObjetos = array();
        while($row = mysqli_fetch_array($consult)){
		$prof = new Prof(
				$row['id_prof'], 
				$row['nome_prof'], 
				$row['fone_prof'], 
				$row['email_prof'],
                $row['password'],
				$row['endereco_prof'], 
				$row['foto_prof']);
        array_push($arrayObjetos, $prof);
        }
        return $arrayObjetos;
	}
	public function serchProf($id_prof) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_professores WHERE id_prof='$id_prof'");
	$prof = new Prof(
			    $row['id_prof'], 
				$row['nome_prof'], 
				$row['fone_prof'], 
				$row['email_prof'],
                $row['password'],
				$row['endereco_prof'], 
				$row['foto_prof']);
    return $prof;
    $this->conexao->executarQuery($sql);
	}
	public function updateProf(Prof $prof){
            $id_prof 		= $prof->getId_prof();
            $nome_prof 		= $prof->getNome_prof();
			$fone_prof		= $prof->getFone_prof();
			$email_prof 	= $prof->getEmail_prof();
            $password    	= $prof->getPassword();
            $endereco_prof 	= $prof->getEndereco_prof();
            $foto_prof 	    = $prof->getFoto_prof();

			$sql = "UPDATE tb_professores SET 
			nome_prof='$nome_prof', 
			fone_prof='$fone_prof', 
			email_prof='$email_prof',
            password='$password',
			endereco_prof='$endereco_prof'
            WHERE id_prof ='$id_prof'";
		$this->conexao->executarQuery($sql);
		}
	public function deleteProf($id_prof) {
			$sql = "DELETE FROM tb_professores WHERE id_prof='$id_prof'";
			$this->conexao->executarQuery($sql);
		}
}

?>