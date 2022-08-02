<!DOCTYPE html>
<html lang= 'pt-br'>
    <head>

        <link rel="stylesheet" href="css/bootstrap.min.css" >

        <style>
            a:link, a:visited {
            background-color: #f1256f;
            color: white;
            padding: 9px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            a:hover, a:active {
            background-color: yellow;
            }
        </style>

    </head>
        
    <body>
        <main>
            <!--tag semantica article-->
            <article>
                <h1 id="page_title">Altere o cadastro da Receita</h1>
            </article>
            <!--tag não semantica br-->
            <br>
            <br>

            <?php
                require("conexao.php");
                $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                $sql_retrieve = "SELECT * FROM receita WHERE idcadastro_receita = ".$cod;
                $res = mysqli_query($con,$sql_retrieve);
                $dados = mysqli_fetch_assoc($res);
               
            ?> 

            <!--target = onde vai abrir o documento vinculado-->
            <!--tag semantica form-->
            <form id="f" action="confirma_alteracao.php" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="idreceita" value="<?php echo $dados['idcadastro_receita'];?>"/>

                <!--tag não semantica div-->
                <div class="row mb-3">
                    <label for="nomep" class="col-sm-2 col-form-label">Nome da Receita:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo $dados['nome_receita'] ; ?> " id="nomereceita" name="nomereceita" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fotovideoreceita" class="col-sm-2 col-form-label">Foto/Vídeo da Receita:</label>
                    <div class="col-sm-9">
                    <img src="<?php echo $dados['arquivo'] ; ?>" class="img-thumbnail" width='25%' class="img-fluid"/>
                    <input type="file" class="form-control" id="fotovideoreceita" name="fotovideoreceita"/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomec" class="col-sm-2 col-form-label">Tempo de Preparo (min): <abbr title="required">*</abbr></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $dados['tempo_preparo']; ?>" autofocus id="tempopreparo" name="tempopreparo" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="habitat" class="col-sm-2 col-form-label">Porções: <abbr title="required">*</abbr></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $dados['porcoes']; ?>" autofocus id="porcoes" name="porcoes" />
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
                                <option value ="<?php echo $row_categoria['idcadastro_categoria']; ?>" <?php if($dados['idcategoria'] == $row_categoria['idcadastro_categoria'])echo "selected"; ?>><?php echo $row_categoria['nome_categoria']; ?>
                                </option> <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ingredientes" class="col-sm-2 col-form-label">Ingredientes: <abbr title="required">*</abbr></label>
                    <div class="col-sm-9">
                        <textarea id="ingredientes" placeholder = "Exemplo 03 ovos" name="ingredientes" rows="4" cols="50"><?php echo $dados['ingredientes']; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="modopreparo" class="col-sm-2 col-form-label">Modo de Preparo: <abbr title="required">*</abbr></label>
                    <div class="col-sm-9">
                    <textarea id="modopreparo" placeholder = "Bata todos os ovos no liquidificador..." name="modopreparo" rows="4" cols="50"><?= $dados['modo_preparo'] ?></textarea>
                    </div>
                </div>       
                <!--tag não semantica div-->         
                <div class="button">
                    <button type="submit" class="btn btn-dark" >Confirmar Alteração</button>
                    <a href="minhasreceitas.php">Cancelar</a>   
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