<?php
class User{
    private $id_user;
    private $username;
    private $usernascimento;
    private $useremail;
    private $usertipo;
    private $password;
    private $user_foto;

    public function __construct(
        $id_user=0, 
        $username="", 
        $usernascimento="", 
        $useremail="", 
        $usertipo="", 
        $password="", 
        $user_foto=""){

        $this->id_user = $id_user;
        $this->username = $username;
        $this->usernascimento = $usernascimento;
        $this->useremail = $useremail;
        $this->usertipo = $usertipo;
        $this->password = $password;
        $this->user_foto = $user_foto;
    }
    public function getId_user(){
        return $this->id_user;
    }
    public function setId_user($id_user){
        $this->id_user = $id_user;
    }
     public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
     public function getUsernascimento(){
        return $this->usernascimento;
    }
    public function setUsernascimento($usernascimento){
        $this->usernascimento = $usernascimento;
    }
    public function getUseremail(){
       return $this->useremail;
   }
   public function setUseremail($useremail){
       $this->useremail = $useremail;
   }
   public function getUsertipo(){
    return $this->usertipo;
    }
    public function setUsertipo($usertipo){
        $this->usertipo = $usertipo;
    }
     public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getUser_foto(){
        return $this->user_foto;
    }
    public function setUser_foto($user_foto){
        $this->user_foto = $user_foto;
    }
}
?>