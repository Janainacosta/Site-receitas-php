<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <title></title>

  <?php session_start();

  $codigo = $_SESSION['id'];
  
  $con = mysqli_connect("localhost","root","","site_receitas");
  $sql = "SELECT * FROM usuario WHERE id_usuario = '".$codigo."'";
  $res = mysqli_query($con, $sql);
  $dados = mysqli_fetch_assoc($res);
  mysqli_close($con);

  ?>

</head>
<body>

  

  <div class='container-fluid'>

    <header class="row">
      <div class="col-md-12">
        <div class="jumbotron" role="alert" style="margin-top: 70px;">
          <h1>Alterando dados de Pessoas</h1>
        </div>
      </div>
    </header>

    <div class='row'>
      <div class="col-md-12">
          <legend>Fale conosco</legend>
          <form action="confirma_alteracao_pessoas.php" method="POST">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="nome">Nome</label>
                <input type="text" value="<?php echo $dados['nome_usuario'];?>" class="form-control" name='nome' id="nome" placeholder="Nome">
              </div>
              
              <input type='hidden' value="<?php echo $dados['id_usuario'];?>" name='codigo_pessoas'>
              <div class="form-group col-md-12">
                <label for="email">E-mail</label>
                <input type="email" value="<?php echo $dados['email_usuario'];?>" class="form-control" name='email' id="email" placeholder="E-mail">
              </div>
              <div class="form-group col-md-12">
                <label for="senha">Senha</label>
                <input type="text" value="<?php echo $dados['senha_usuario'];?>" class="form-control" name='senha' id="senha" placeholder="Nome">
              </div>
             
            </div>

            <button type="submit" class="btn btn-primary">Alterar</button>
            <a href='lista_pessoas.php' class="btn btn-danger">Cancelar</a>
          </form>
      </div>
    </div>
  </div>  



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" ></script>


</body>
</html>