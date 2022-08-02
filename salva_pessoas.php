<?php
require ("conexao.php");


// pegar dados da pessoa: nome, email e senha
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

echo "Nome:".$nome;
echo "<br>Email:".$email;
echo "<br>Senha:".$senha;




// salvar as pessoas em usuarios, alterando o sql

//$con = mysqli_connect("localhost","root","","site_receitas");
$sql = "INSERT INTO usuario VALUES (NULL, '".$nome."', '".$email."', '".$senha."')";
echo $sql;

  
   if(mysqli_query($con,$sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    echo "<h2>".$msg."</h2>";

    mysqli_close($con);   
    
    echo "<script>alert('Cadastro Efetuado Com Sucesso, Faça o Login');window.location='login.php'</script>";
   

?>