<?php

$codigo = $_GET['cod'];
echo "<br>Codigo:".$codigo;



$con = mysqli_connect("localhost","root","","site_receitas");

$sql = "DELETE FROM pessoas WHERE idpessoas = '".$codigo."'";

  
   if(mysqli_query($con,$sql)){
        $msg = "Excluido com sucesso!";
    }else{
        $msg = "Erro ao excluir!";
    }
    echo "<h2>".$msg."</h2>";

    mysqli_close($con);   
    
    echo "<script>alert('Excluido com sucesso!');window.location='lista_pessoas.php'</script>";
   

?>