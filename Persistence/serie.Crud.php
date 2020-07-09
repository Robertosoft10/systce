<?php
include_once 'class.conexao.php';
include_once '../Modell/class.serie.php';

class CRUDSerie{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	
	
	public function insertSerie(Serie $serie){
			$nome_serie	= $serie->getNome_serie();

			$sql = "INSERT INTO tb_series (id_serie, nome_serie) VALUES (null, '$nome_serie')";
		$this->conexao->executarQuery($sql);
		}
	public function listSerie() {
        $consult = $this->conexao->executarQuery("SELECT * FROM tb_series");
        $arrayObjetos = array();
        while($row = mysqli_fetch_array($consult)){
		$serie = new Serie($row['id_serie'], $row['nome_serie']);
        array_push($arrayObjetos, $serie);
        }
        return $arrayObjetos;
	}
	public function serchSerie($id_serie) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_series WHERE id_serie='$id_serie'");
	$serie = new Serie($row['id_serie'], $row['nome_serie']);
    return $serie;
    $this->conexao->executarQuery($sql);
	}
	public function updateSerie(Serie $serie){
            $id_serie    = $serie->getId_serie();
            $nome_serie	 = $serie->getNome_serie();

			$sql = "UPDATE tb_series SET nome_serie='$nome_serie' WHERE id_serie ='$id_serie'";
		$this->conexao->executarQuery($sql);
		}
	public function deleteSerie($id_serie) {
			$sql = "DELETE FROM tb_series WHERE id_serie='$id_serie'";
			$this->conexao->executarQuery($sql);
		}
}

?>