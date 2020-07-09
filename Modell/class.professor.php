<?php
class Prof{
    private $id_prof;
    private $nome_prof;
    private $fone_prof;
    private $email_prof;
    private $password;
    private $endereco_prof;
    private $foto_prof;

    public function __construct(
        $id_prof=0, 
        $nome_prof="", 
        $fone_prof="", 
        $email_prof="",
        $password="", 
        $endereco_prof="", 
        $foto_prof=""){

        $this->id_prof = $id_prof;
        $this->nome_prof = $nome_prof;
        $this->fone_prof = $fone_prof;
        $this->email_prof = $email_prof;
        $this->password = $password;
        $this->endereco_prof = $endereco_prof;
        $this->foto_prof = $foto_prof;
    }
    public function getId_prof(){
        return $this->id_prof;
    }
    public function setId_prof($id_prof){
        $this->id_prof = $id_prof;
    }
     public function getNome_prof(){
        return $this->nome_prof;
    }
    public function setNome_prof($nome_prof){
        $this->nome_prof = $nome_prof;
    }
    public function getFone_prof(){
       return $this->fone_prof;
   }
   public function setFone_prof($fone_prof){
       $this->fone_prof = $fone_prof;
   }
     public function getEmail_prof(){
        return $this->email_prof;
    }
    public function setEmail_prof($email_prof){
        $this->email_prof = $email_prof;
    }
     public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getEndereco_prof(){
        return $this->endereco_prof;
    }
    public function setEndereco_prof($endereco_prof){
        $this->endereco_prof = $endereco_prof;
    }
    public function getFoto_prof(){
        return $this->foto_prof;
    }
    public function setFoto_prof($foto_prof){
        $this->foto_prof = $foto_prof;
    }
}
?>