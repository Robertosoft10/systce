<?php
ob_start();
if(($_SESSION['useremail'] == "") || ($_SESSION['password'] == "")) {
	$_SESSION['secury'] = "Login obrigatório";
	header('location: /../systce/index.php');
}

?>
