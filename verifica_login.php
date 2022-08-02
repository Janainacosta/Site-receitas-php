<?php session_start();
require ("conexao.php");
// para pegar a página que chamou a pagina verifica_login
$pagina =$_SESSION['pagina'];

// pegar senha e email do usuario!
$email = $_POST['email'];       
$senha = $_POST['senha'];

//$con = mysqli_connect("localhost","root","","site_receitas");      
$sql = "SELECT *, count(*) as TOTAL FROM usuario WHERE (email_usuario = '$email' AND senha_usuario = '$senha')";    
echo $sql;

$res = mysqli_query($con,$sql);
$dados = mysqli_fetch_assoc($res);

if($dados['TOTAL'] == 1){ 

	$_SESSION['logado'] = TRUE;
	$_SESSION['nome'] = $dados['nome_usuario'];
	$_SESSION['id'] = $dados['id_usuario'];

	// ir para pagina principal
	echo "<script>;window.location='$pagina'</script>";
}else{
	echo "<script>;window.location='login.php'</script>";

}

mysqli_close($con);

?>