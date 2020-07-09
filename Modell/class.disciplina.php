<?php
class Discip{
    private $id_discip;
    private $nome_discip;
    private $hora_discip;

    public function __construct(
        $id_discip=0, 
        $nome_discip="", 
        $hora_discip=""){

        $this->id_discip = $id_discip;
        $this->nome_discip = $nome_discip;
        $this->hora_discip = $hora_discip;
    }
    public function getId_discip(){
        return $this->id_discip;
    }
    public function setId_discip($id_discip){
        $this->id_discip = $id_discip;
    }
     public function getNome_discip(){
        return $this->nome_discip;
    }
    public function setNome_discip($nome_discip){
        $this->nome_discip = $nome_discip;
    }
    public function getHora_discip(){
       return $this->hora_discip;
   }
   public function setHora_discip($hora_discip){
       $this->hora_discip = $hora_discip;
   }
}
?>