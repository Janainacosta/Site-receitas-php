<?php session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

// Cria a conexão com o banco de dados
require ("conexao.php");

$cod = (isset($_POST['idreceita'])) ? $_POST['idreceita'] : "";

$a = "SELECT arquivo from receita WHERE idcadastro_receita = '$cod'";


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

if (empty($_FILES['fotovideoreceita']['name'])) {
    $sql_update = "UPDATE receita SET nome_receita = '$nomereceita', tempo_preparo = '$tempopreparo', porcoes = '$porcoes', idcategoria = '$categoria', ingredientes = '$ingredientes', modo_preparo = '$modopreparo', idusuario = '$usuario' WHERE idcadastro_receita = '$cod'";
} else {
    $sql_update = "UPDATE receita SET nome_receita = '$nomereceita', tempo_preparo = '$tempopreparo', porcoes = '$porcoes', idcategoria = '$categoria', ingredientes = '$ingredientes', modo_preparo = '$modopreparo', idusuario = '$usuario', arquivo = '$destino' WHERE idcadastro_receita = '$cod'";
    $res = mysqli_query($con,$a);
    $dados = mysqli_fetch_assoc($res);
    unlink($dados["arquivo"]);
}

print_r($sql_update);

if(mysqli_query($con,$sql_update)){
    echo "<script>alert('Cadastro Alterado com Sucesso');window.location='minhasreceitas.php'</script>";
}else{
    //echo "<script>alert('Erro ao Alterar');window.location='receitascadastradas.php'</script>";
}

mysqli_close($con);

?>