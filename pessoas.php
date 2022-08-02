<?php
    include("menu.php");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <title></title>
</head>
<body>

 

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron" role="alert" style="margin-top: 70px;">
          <h1>Faça seu Cadastro</h1>
        </div>
      </div>

      <!--
        pedir nome, email e senha
      -->

      <div class="col-md-12">
        <form action="salva_pessoas.php" method="POST">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name='nome' id="nome" placeholder="Nome" required="true">
            </div>
            
            <div class="form-group col-md-12">
              <label for="email">E-mail:</label>
              <input type="email" class="form-control" name='email' id="email" placeholder="E-mail" required="true">
            </div>

            <div class="form-group col-md-12">
              <label for="senha">Senha:</label>
              <input type="password" class="form-control" name='senha' id="senha" placeholder="Senha" required="true">
            </div>
            
          </div>
          <button type="submit" class="btn btn-outline-secondary">Enviar</button>
          <!-- <a href='lista_pessoas.php' class="btn btn-danger">Cancelar</a> -->
        </form>
        <br>
      </div> 
    </div>   
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" ></script>

  <script language="JavaScript" type="text/javascript" charset="utf-8">
  </script>

</body>
</html>
<?php
    include("footer.php");
?>