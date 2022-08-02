<?php session_start();
    include_once("conexao.php");
?>
<?php 
if(!$_SESSION['logado']){
    echo "<script>alert('Ambiente restrito. Favor fazer login para acessar.');window.location='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang= 'pt-br'>
<?php
include("menu.php");
?>        
    <body>
        <main>
            <!--tag semantica article-->
            <article>
                <h1 id="page_title">Adicione um comentario à Receita</h1>
            </article>
            <!--tag não semantica br-->
            <br>
            <br>

            <?php
                $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                $sql_retrieve = "SELECT * FROM receita WHERE idcadastro_receita = ".$cod;
                $res = mysqli_query($con,$sql_retrieve);
                $dados = mysqli_fetch_assoc($res);              
            ?> 

            <!--target = onde vai abrir o documento vinculado-->
            <!--tag semantica form-->
            <form id="f" action="adiciona_comentario.php" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="idreceita" value="<?php echo $dados['idcadastro_receita'];?>"/>

                <!--tag não semantica div-->
                <div class="row mb-3">
                    <label for="comentario" class="col-sm-2 col-form-label">Comentário:</label>
                    <div class="col-sm-9">
                        <textarea name='comentario' placeholder = "Digite seu comentário..."></textarea>
                        <br><br>
                        <input type=submit value=Enviar class="btn btn-outline-secondary">
                        <input type=reset value=Limpar class="btn btn-outline-secondary">
                    </div>
                </div>    
            </form>
        </main>
        <!--tag semantica footer-->
        <?php  mysqli_close($con); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="radios.js"></script>       
    </body>
</html>
<?php
    include("footer.php");
?>