<?php
@session_start();
date_default_timezone_set('America/Sao_Paulo');
$hoje = date("Y_m_d");
$arquivo = fopen("../Logs/log_tarefa.$hoje.txt", "ab");
$data = date("d/m/y");
$hora = date("H:i:s T");
@$usuario = $_SESSION['username'];
fwrite($arquivo, "Data: [$data] Hora->[$hora] Usuário->[$usuario] $x .\r\n");
fclose($arquivo);
?>
