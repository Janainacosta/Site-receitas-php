<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbnome = "site_receitas";

#estabelecemos conexão com o banco de dados
$con = mysqli_connect($servidor, $usuario, $senha, $dbnome);

if (!$con){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexão realizada com sucesso";
}
?>