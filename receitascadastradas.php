<!DOCTYPE html>
<html lang= 'pt-br'>
    <head>
        <!-- MetaTags para SEO-->
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link rel="canonical" href="file:///C:/Users/hemili/Desktop/index.html"/>
        <title>Cadastros Flores</title>
        <meta charset="utf-8">
        <meta name='author' content='Hemili Beatriz Alves Trindade, Daniele Oliveira Santos'>
        <meta name="reply-to" content="hemilibeatriz@gmail.com">
        <meta name='description' content='Página Web para cadastro de Flores'>
        <meta name="keywords" content="flores, cadastros"/>

        <!--Open Graph Data (facebook)-->
        <meta property = 'og: title' content = 'Cadastros Flores'/>
        <meta property = 'og: url' content = 'file:///C:/Users/hemili/Desktop/index.html'/>
        <meta property = 'og: type' content = 'website'/>
        <meta property = 'og: description' content = 'Página Web para cadastro de Flores'/>
        <meta property = 'og: image' content = 'C:\Users\hemili\Desktop/flor.jpg'/>

        <!--Twitter Card (twitter)-->
        <meta name='twitter:card' content='photo'/>
        <meta name='twitter:title' content='Cadastro Flores'/>
        <meta name='twitter:description' content='Página Web para cadastro de Flores'/>
        <meta name='twitter:url' content='file:///C:/Users/hemili/Desktop/index.html'/>
        <meta name='twitter:image' content='C:\Users\hemili\Desktop/flor.jpg'/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <!--tag semantica header-->
        <header>
            <!--tag não semantica div-->
            <div>
                <!--<img src='logo.png' alt = 'Logo' title = 'Logo Flores.com' width="150" >-->
            </div>
        </header>
        <!--Crie um menu de navegação com lista não ordenada-->
        <!--tag semantica nav-->

        <!--tag semantica main-->
        <main>
            <!--tag semantica article-->
            <article>
                <h1 id="page_title">Receitas Cadastradas</h1>
            </article>
            <!--tag não semantica br-->
            <br>
            <br>
            <!--target = onde vai abrir o documento vinculado-->
            <!--tag semantica form-->
                <!--tag não semantica div-->
            <div class='row'>
                <div class='col-12'>
                    <div class='container'>
                    <?php
                        require("conexao.php");
                        $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                        $sql = "SELECT * FROM receita ORDER BY idcadastro_receita DESC ";
                        $res = mysqli_query($con,$sql);
                        
                        echo "<table class='table mt-3'>
                        <thead>
                            <tr>
                                <th scope='col'>Nome Receita</th>
                            </tr>
                        </thead>
                        <tbody>";

                        $num_rows = mysqli_num_rows($res);
                        if($num_rows > 0){
                            while($dados = mysqli_fetch_assoc($res)){
                                        echo "<tr>
                                        <td>".$dados['nome_receita']."</td>
                                        </tr>";
                                        $seleciona = mysqli_query($con,"SELECT * FROM comentarios WHERE idcadastro_receita = '{$dados['idcadastro_receita']}' ORDER BY idcomentario DESC");
                                        $conta = mysqli_num_rows($seleciona);
                                        if($conta <=0){
                                            echo "<tr class='text-center'><td colspan='3'> Não há Comentários Cadastrados! </td></tr>";
                                        }else{
                                            while($rows = mysqli_fetch_array($seleciona)){
                                                $comentario = $rows['comentario'];
                                                $data = $rows['datacomentario'];
                                                $data2 = date('d/m/Y', strtotime($data));
                                                echo "<tr class='text-center'><td colspan='3'>$comentario</td></tr>";
                                                echo "<tr class='text-center'><td colspan='3'>$data2</td></tr>";
                                            }
                                        }                                      
                                        echo "<tr>
                                        <td><a class='btn btn-light' href='curtidas.php?cod=".$dados['idcadastro_receita']."'>Curtir</a>
                                        <td><a class='btn btn-light' href='favoritar.php?cod=".$dados['idcadastro_receita']."'>Favoritar</a>
                                        <td><a class='btn btn-light' href='comenta_receita.php?cod=".$dados['idcadastro_receita']."'>Comentar</a>
                                        <td><a class='btn btn-success' href='altera_receita.php?cod=".$dados['idcadastro_receita']."'>Alterar</a>
                                        <a class='btn btn-danger btn-exclui' href='exclui_receita.php?cod=".$dados['idcadastro_receita']."'>Excluir</a></td>
                                        </tr>";
                                }
                        }else{
                                echo "<tr class='text-center'><td colspan='3'> Não há Receitas Cadastradas! </td></tr>";
                        }
                        echo "</tbody></table>";
                    ?> 
                    </div>
                </div>
            </div>
        </main>
        <!--tag semantica footer-->
        <footer>
        <h3>©Copyright 2021 by Receitas para você, All rights reversed.</h3>
        </footer>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>      
    </body>
</html>