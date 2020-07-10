<?php
session_start();
include_once 'conection.php';
$sql = "SHOW TABLES";
$consult = mysqli_query($conexao, $sql);
while($row = mysqli_fetch_row($consult)){
    $tabelas[] = $row[0];
}
$result = "";
foreach($tabelas as $tabela){
    $colunas = "SELECT * FROM " . $tabela;
    $result_coluna = mysqli_query($conexao, $colunas);
    $num_coluna = mysqli_num_fields($result_coluna);
    
    $result .= 'DROP TABLE IF EXISTS'.$tabela.';';
    $result_tabelas = "SHOW CREATE TABLE " . $tabela;
    $resultado_tabelas = mysqli_query($conexao, $result_tabelas);
    $row_tabelas = mysqli_fetch_row($resultado_tabelas);
    
    $result .= "\n\n" . $row_tabelas[1] . ";\n\n";
   
    
    for($i = 0; $i < $num_coluna; $i++){
      while($row_tipo_coluna = mysqli_fetch_row($result_coluna)){
           $result .= 'INSERT INTO ' . $tabela . 'VALUES(';
          for($j = 0; $j < $num_coluna; $j++){
            $row_tipo_coluna[$j] = addslashes($row_tipo_coluna[$j]);
              
            $row_tipo_coluna[$j] = str_replace("\n", "\\n", $row_tipo_coluna[$j]);
              
              if(isset( $row_tipo_coluna[$j])){
                  $result .= '"' .  $row_tipo_coluna[$j] . '"';
              }else{
                  $result .= '""';
              }
              if($j < ($num_coluna - 1)){
                   $result .= ',';
              }
          }
           $result .= ");\n";
      }
    }
     $result .= "\n\n";
}
$diretorio = '../backup_db/';
if(!is_dir($diretorio)){
    mkdir($diretorio, 0777, true);
    chmod($diretorio, 0777);
}
$data = date('Y-m-d-h-i-s');
$arquivo = $diretorio . "db_backup_".$data;

$handle = fopen($arquivo . '.sql', 'w+');
fwrite($handle, $result);
fclose($handle);

$download = $arquivo. ".sql";

if(file_exists($download)){
    session_destroy();
unset($_SESSION['useremail'],
	$_SESSION['password']);
    header('location: /../systce/index.php');
}else{
    unset($_SESSION['useremail'],
	$_SESSION['password']);
    header('location: /../systce/index.php');
}
?>
