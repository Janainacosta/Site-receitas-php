<?php session_start();
// Cria a conexão com o banco de dados
require ("conexao.php");

$nomereceita = (isset($_POST['nomereceita'])) ? $_POST['nomereceita'] : "";
$tempopreparo = (isset($_POST['tempopreparo'])) ? $_POST['tempopreparo'] : "";
$porcoes = (isset($_POST['porcoes'])) ? $_POST['porcoes'] : "";
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
$ingredientes = (isset($_POST['ingredientes'])) ? $_POST['ingredientes'] : "";
$modopreparo = (isset($_POST['modopreparo'])) ? $_POST['modopreparo'] : "";
$usuario = $_SESSION['id'];
$file = $_FILES['fotovideoreceita'];
$diretorio = "upload/";
$destino = "$diretorio".$file["name"];
if (move_uploaded_file($file["tmp_name"], $destino)){
   echo "ok";
}else {
    echo "deu ruim";
}

$sql_insert = "INSERT INTO receita (nome_receita,  tempo_preparo, porcoes, idcategoria, ingredientes, modo_preparo, idusuario, arquivo, dat, quantidadecurtida, quantidadefavorita) VALUES ('$nomereceita','$tempopreparo','$porcoes','$categoria','$ingredientes', '$modopreparo', '$usuario', '$destino', NOW(),0,0)";

print_r($sql_insert);

if(mysqli_query($con,$sql_insert)){
    echo "<script>alert('Obrigada por Cadastrar a Sua Receita');window.location='minhasreceitas.php'</script>";
}else{
    //echo "<script>alert('Erro ao Cadastrar');window.location='cadastroreceitas.php'</script>";
}

mysqli_close($con);

?>