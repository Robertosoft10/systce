<?php
class Inst{
private $id_inst;
private $nome_instituicao;
private $fone1_instituicao;
private $fone2_instituicao;
private $email_instituicao;
private $endereco_instituicao;
private $direcao_instituicao;
private $logo_instituicao;
private $frase_instituicao;

    public function __construct(
        $id_inst=0,
        $nome_instituicao="",
        $fone1_instituicao="",
        $fone2_instituicao="",
        $email_instituicao="",
        $endereco_instituicao="",
        $direcao_instituicao="",
        $logo_instituicao="",
        $frase_instituicao=""){

        $this->id_inst = $id_inst;
        $this->nome_instituicao = $nome_instituicao;
        $this->fone1_instituicao = $fone1_instituicao;
        $this->fone2_instituicao = $fone2_instituicao;
        $this->email_instituicao = $email_instituicao;
        $this->endereco_instituicao = $endereco_instituicao;
        $this->direcao_instituicao = $direcao_instituicao;
        $this->logo_instituicao = $logo_instituicao;
        $this->frase_instituicao = $frase_instituicao;
    }
    public function getId_inst(){
        return $this->id_inst;
    }
    public function setId_inst($id_inst){
        $this->id_inst = $id_inst;
    }
     public function getNome_instituicao(){
        return $this->nome_instituicao;
    }
    public function setNome_instituicao($nome_instituicao){
        $this->nome_instituicao = $nome_instituicao;
    }
    public function getFone1_instituicao(){
       return $this->fone1_instituicao;
   }
   public function setFone1_instituicao($fone1_instituicao){
       $this->fone1_instituicao = $fone1_instituicao;
   }
   public function getFone2_instituicao(){
       return $this->fone2_instituicao;
   }
   public function setFone2_instituicao($fone2_instituicao){
       $this->fone2_instituicao = $fone2_instituicao;
   }
     public function getEmail_instituicao(){
        return $this->email_instituicao;
    }
    public function setEmail_instituicao($email_instituicao){
        $this->email_instituicao = $email_instituicao;
    }
    public function getEndereco_instituicao(){
        return $this->endereco_instituicao;
    }
    public function setEndereco_instituicao($endereco_instituicao){
        $this->endereco_instituicao = $endereco_instituicao;
    }
    public function getDirecao_instituicao(){
        return $this->direcao_instituicao;
    }
    public function setDirecao_instituicao($direcao_instituicao){
        $this->direcao_instituicao = $direcao_instituicao;
    }
    public function getLogo_instituicao(){
        return $this->logo_instituicao;
    }
    public function setLogo_instituicao($logo_instituicao){
        $this->logo_instituicao = $logo_instituicao;
    }
    public function getFrase_instituicao(){
        return $this->frase_instituicao;
    }
    public function setFrase_instituicao($frase_instituicao){
        $this->frase_instituicao = $frase_instituicao;
    }
}
?>