<?php session_start();
    require("conexao.php");

    $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "";
    
    $imagem = "SELECT arquivo from receita WHERE idcadastro_receita = '$cod'";
    $res = mysqli_query($con,$imagem);
    $dados = mysqli_fetch_assoc($res);
    if(unlink($dados["arquivo"])){
        echo "Foto excluída com sucesso";
    }else{
        echo "Deu ruim";
    }
  

    $sql_delete = "DELETE FROM receita WHERE idcadastro_receita = '$cod'";   

    print_r($sql_delete);

    if(mysqli_query($con,$sql_delete)){
        echo "<script>alert('Cadastro excluído com sucesso!');window.location='minhasreceitas.php'</script>";
    }else{
        //echo "<script>alert('Erro ao Excluir!');window.location='receitascadastradas.php'</script>";
    }

    mysqli_close($con);

?>