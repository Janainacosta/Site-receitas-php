<?php session_start();


//echo isset($_SESSION['logado'];
if(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE) 
  header('Location: index.php');
?>

<!doctype html>
<html lang="pt-br">
<?php
    include("menu.php");
?>
  <body>
    <div style='width: 300px; margin: 0 auto; margin-top: 100px;'>

      <!-- <?php if($_SESSION['logado'] != TRUE){ ?> -->

      <h3>Efetuar Login</h3>

      <!-- o verifica login, vai verificar se o usuario existe! -->


      <form id='formlogin' method='post' action='verifica_login.php'>
        <div class="form-group">
          <label for="email"> Email: </label>
          <!-- verificar o input do email -->
           <input type='email' class='form-control' name='email' id='email' placeholder='informe seu email'>
          </div>

          <div class="form-group">
            <label for='senha'> Senha: </label>
            <input type='password' class='form-control' name='senha' id='senha' placeholder='informe sua senha'>
            
          </div>
          
          <input type='submit' value='Efetuar login' class="btn btn-outline-success">

          <a href="index.php" class="btn btn-outline-secondary">Voltar</a>

          <!-- mandar a pessoa para de cadastro -->
          <!--<a href="pessoas.php" class="btn btn-success">Cadastrar-se</a>-->

       </form>
        <!-- <?php }else{
           echo "<span>Prezado ". $_SESSION['nome']." Você já está logado.</span>";
          echo " &nbsp;&nbsp; <a href='lista_pessoas.php'> Ir para listagem de pessoas</a>";
        } ?> -->
      </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>
<?php
    include("footer.php");
?>