
<?php session_start();
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  //error_reporting(E_ALL);

require ("conexao.php");

$cod = (isset($_POST['idreceita'])) ? $_POST['idreceita'] : "";
$usuario = $_SESSION['id'];

date_default_timezone_set('America/Sao_paulo');
$data = date("Y/m/d");           
$comentario = (isset($_POST['comentario'])) ? $_POST['comentario'] : "";

$sql_insert = "INSERT INTO comentarios (idcadastro_usuario, idcadastro_receita, datacomentario, comentario) VALUES ('$usuario','$cod','$data','$comentario')";

print_r($sql_insert);

if(mysqli_query($con,$sql_insert)){
    echo "<script>alert('Obrigada por Comentar :)');window.location='index.php.#section2'</script>";
}else{
  echo "<script>alert('Você precisa ter um Cadastro para Comentar a receita: se já possui, efetue Login, caso não possua, faça seu cadastro');window.location='index.php.#section2'</script>";
}

mysqli_close($con);
?>

