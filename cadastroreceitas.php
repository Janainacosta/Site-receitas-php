<?php session_start();
    include_once("conexao.php");
    $_SESSION['pagina'] = "cadastroreceitas.php";
?>
<?php 
if(!$_SESSION['logado']){
    echo "<script>alert('Voce precisa fazer Login para Cadastrar uma Receita: se já possui cadastro, faça login, caso não possua, faça seu cadastro');window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang= 'pt-br'>
<?php
    include("menu.php");
?>

    <body>
    <br>
        <a href="index.php" title="Voltar" class="btn btn-outline-secondary" >Voltar</a></li>
        <!--tag semantica main-->
        <main>
            <!--tag semantica article-->
            <article>
                <h1 id="page_title">Cadastre sua Receita</h1>
            </article>

            <!--tag não semantica br-->
            <br>
            <br>
            <!--target = onde vai abrir o documento vinculado-->
            <!--tag semantica form-->
            <form id="f" action="salvareceitas.php" method="POST" enctype="multipart/form-data">
                <!--tag não semantica div-->
                <div class="row mb-3">
                    <label for="nomereceita" class="col-sm-2 col-form-label">Nome da Receita:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" autofocus id="nomereceita" placeholder="Digite aqui..." name="nomereceita" required="true"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fotovideoreceita" class="col-sm-2 col-form-label">Foto/Vídeo da Receita:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" autofocus id="fotovideoreceita" name="fotovideoreceita" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tempopreparo" class="col-sm-2 col-form-label">Tempo de Preparo (min):</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" autofocus id="tempopreparo" placeholder="Digite aqui..." name="tempopreparo" required="true"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="porcoes" class="col-sm-2 col-form-label">Porções:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" autofocus id="porcoes" placeholder="Digite aqui..." name="porcoes" required="true"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Categoria:</label>
                    <div class="col-sm-9">
                    <select class="form-control" name='categoria' id="exampleFormControlSelect1">
                        <?php
                            $result_categoria = "SELECT * FROM categoria";
                            $resultado_categoria = mysqli_query($con, $result_categoria);
                            while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                <option value ="<?php echo $row_categoria['idcadastro_categoria']; ?>"><?php echo $row_categoria['nome_categoria']; ?>
                                </option> <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ingredientes" class="col-sm-2 col-form-label">Ingredientes:</abbr></label>
                    <div class="col-sm-9">
                        <textarea id="ingredientes" placeholder = "Exemplo: 03 ovos, 1/2 copo de farinha..." name="ingredientes" rows="4" cols="50" required="true"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="modopreparo" class="col-sm-2 col-form-label">Modo de Preparo:</label>
                    <div class="col-sm-9">
                    <textarea id="modopreparo" placeholder = "Bata todos os ovos no liquidificador..." name="modopreparo" rows="4" cols="50" required="true"></textarea>
                    </div>
                </div>
                <!--tag não semantica div-->         
                <div class="button" >
                    <button class="btn btn-outline-secondary" type="submit">Enviar</button>
                </div>
            </form>
            <br>
        </main>
        <script type="text/javascript" src="radios.js"></script>
        <!--tag semantica footer-->
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>       
    </body>
</html>
<?php
    include("footer.php");
?>