<?php session_start();
$nome = $_POST['nome'];
$email = $_POST['email'];
$codigo = $_POST['codigo_pessoas'];
$senha = $_POST['senha'];

echo "<br>Nome:".$nome;
echo "<br>E-mail:".$email;



$con = mysqli_connect("localhost","root","","site_receitas");

$sql = "UPDATE usuario SET nome_usuario = '".$nome."', email_usuario = '".$email."' WHERE id_usuario = ".$codigo."";


if(mysqli_query($con,$sql)){
	$msg = "Alterado com sucesso!";
}else{
	$msg = "Erro ao gravar!";
}
echo "<h2>".$msg."</h2>";

mysqli_close($con);  
$_SESSION['nome'] =  $nome;

echo "<script>alert('Alteração realizada');window.location='index.php'</script>";
    #header("Refresh: 1;url=contato.php");

?>