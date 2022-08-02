
<?php session_start();
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  //error_reporting(E_ALL);

  require ("conexao.php");

  $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "";
  $usuario = $_SESSION['id'];


  $sql_insert = "INSERT INTO curtidas (idcadastro_usuario, idcadastro_receita) VALUES ('$usuario','$cod')";

  print_r($sql_insert);

  if(mysqli_query($con,$sql_insert)){
    echo "<script>alert('Obrigada por curtir');window.location='index.php.#section2'</script>";
  }else{
    echo "<script>alert('Você precisa ter um Cadastro para Curtir a receita: se já possui, efetue Login, caso não possua, faça seu cadastro');window.location='index.php.#section2'</script>";
  }

  mysqli_close($con);



 // require("conexao.php");

  //$cod = (isset($_GET['idfavoritar'])) ? $_GET['idfavoritar'] : "";
  
  //$id_favoritar = (isset($_POST['id_favoritar'])) ? $_POST['id_favoritar'] : "";          
 // $id_post = (isset($_POST['id_post'])) ? $_POST['id_post'] : "";


  //$sql_insert = "INSERT INTO favoritar (id_favoritar, id_post) VALUES ('$id_favoritar','$id_post')";
  //print_r($sql_insert);

  /*if(mysqli_query($con,$sql_insert)){
      echo "<script>alert('Obrigada por favoritar');window.location='favoritar.php'</script>";
  }else{
      //echo "<script>alert('Erro ao favoritar');window.location='receitascadastradas.php'</script>";
  }

  mysqli_close($con); */

?>

