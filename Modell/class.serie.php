<?php
class Serie{
    private $id_serie;
    private $nome_serie;
    
    public function __construct(
        $id_serie=0, 
        $nome_serie=""){

        $this->id_serie = $id_serie;
        $this->nome_serie = $nome_serie;
    }
    public function getId_serie(){
        return $this->id_serie;
    }
    public function setId_serie($id_serie){
        $this->id_serie = $id_serie;
    }
     public function getNome_serie(){
        return $this->nome_serie;
    }
    public function setNome_serie($nome_serie){
        $this->nome_serie = $nome_serie;
    }
}
?>