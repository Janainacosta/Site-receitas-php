<?php session_start();

//if($_SESSION['logado'] != TRUE){
 // echo "<script>alert('Acesso restrito!');window.location='login.php'</script>";
//}

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >

  <script>
    function exclui_funcionario(id){
      if(confirm("Confirma exclusão?")){
        window.location='exclui_pessoas.php?cod='+id
      }
    }
  </script>

  <title></title>
</head>
<body>



  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron" role="alert" style="margin-top: 70px;">
          <h1>Lista </h1>
          <a href="pessoas.php" class='btn btn-primary mt-2'>Novo</a>
        </div>
      </div>
      <div class="col-md-12">
        <?php
        $con = mysqli_connect("localhost","root","","mydb");
        $sql = "SELECT * FROM pessoas";
        $res = mysqli_query($con, $sql);
        echo "<table class='table'>
        <thead>
        <tr>
        <th scope='col'>Nome</th>
         <th scope='col'>E-mail</th>
      
       
       
        </tr>
        </thead>
        <tbody>";
        while($dados = mysqli_fetch_assoc($res)){
          echo "<tr>   
          <td>".$dados['nome']."</td>
          <td>".$dados['email']."</td>
        
          
          <td><a href='#' onclick='exclui_pessoas(".$dados['idpessoas'].")' class='btn btn-danger'>Excluir</a>
          |
          <a href='altera_pessoas.php?cod=".$dados['idpessoas']."' class='btn btn-success'>Alterar</a>
          </td>
          </tr>";

        }
        echo "</tbody></table>";
        ?>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" ></script>


</script>
</body>
</html>