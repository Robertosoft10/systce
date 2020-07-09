<?php
include_once 'class.conexao.php';
include_once '../Modell/class.usuario.php';

class CRUDUser{
	private $conexao;
	public function __construct(){
	$this->conexao = new Conexao();
	if($this->conexao->conectar() == false){
	echo "Não conectou!" . mysql_error();	
		}
	}	

        public function insertUser(User $user){
            $username 	     = $user->getUsername();
            $usernascimento  = $user->getUsernascimento();
            $useremail       = $user->getUseremail();
            $usertipo 	     = $user->getUsertipo();
            $password 	     = $user->getPassword();
            $user_foto 	     = $user->getUser_foto();

            if(isset($_FILES['user_foto'])){
                $extensao = strtolower(substr($_FILES['user_foto']['name'], -4));
                $novoNome = sha1(time()) . $extensao;
                $diretorio = "../Images/usuario/";
                move_uploaded_file($_FILES['user_foto']['tmp_name'], $diretorio.$novoNome);

            $sql = "INSERT INTO tb_usuarios (
                    id_user, 
                    username,
                    usernascimento,
                    useremail, 
                    usertipo, 
                    password, 
                    user_foto) 
                    VALUES (null, 
                    '$username', 
                    '$usernascimento',
                    '$useremail', 
                    '$usertipo', 
                    '$password', 
                    '$novoNome')";
        $this->conexao->executarQuery($sql);
            }
        }
        public function listUser() {
            $consult = $this->conexao->executarQuery("SELECT * FROM tb_usuarios");
            $arrayObjetos = array();
            while($row = mysqli_fetch_array($consult)){
            $user = new User(
                    $row['id_user'], 
                    $row['username'], 
                    $row['usernascimento'], 
                    $row['useremail'], 
                    $row['usertipo'], 
                    $row['password'], 
                    $row['user_foto']);
            array_push($arrayObjetos, $user);
        }
        return $arrayObjetos;
	}
	public function serchUser($id_user) {
    $row = $this->conexao->consultQuery("SELECT * FROM tb_usuarios WHERE id_user='$id_user'");
	$user = new User(
                    $row['id_user'], 
                    $row['username'], 
                    $row['usernascimento'], 
                    $row['useremail'], 
                    $row['usertipo'], 
                    $row['password'], 
                    $row['user_foto']);;
        return $user;
    $this->conexao->executarQuery($sql);
	}
	public function updateUser(User $user){ 

                $id_user 	     = $user->getId_user();
                $username 	     = $user->getUsername();
                $usernascimento  = $user->getUsernascimento();
                $useremail       = $user->getUseremail();
                $usertipo 	     = $user->getUsertipo();
                $password 	     = $user->getPassword();

				$sql = "UPDATE tb_usuarios SET 
				username='$username', 
                usernascimento='$usernascimento',
				useremail='$useremail', 
				usertipo='$usertipo', 
				password='$password'
				WHERE id_user ='$id_user'";
		$this->conexao->executarQuery($sql);
		}
	public function deleteUser($id_user) {
			$sql = "DELETE FROM tb_usuarios WHERE id_user='$id_user'";
			$this->conexao->executarQuery($sql);
		}
}

?>