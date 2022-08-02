<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
    include("menu.php");
?>
<body>
    <div id ="section1">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block center" src="img/receita1.jpg" alt="First slide" height="360" width="640">
    </div>
    <div class="carousel-item">
      <img class="d-block center" src="img/receita2.jpg" alt="First slide" height="360" width="640">
    </div>
    <div class="carousel-item">
      <img class="d-block center" src="img/receita3.jpg" alt="First slide" height="360" width="640">
    </div>
    <div class="carousel-item">
      <img class="d-block center" src="img/receita4.jpg" alt="First slide" height="360" width="640">
    </div>
    <div class="carousel-item">
      <img class="d-block center" src="img/receita5.jpg" alt="First slide" height="360" width="640">
    </div>
  </div>
</div>
    </div>
    <div id ="section2">
        <h1>Receitas</h1>
        <div class='row'>
            <div class='col-12'>
                <div class='container'>
                    <?php
                        require("conexao.php");
                        $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                        $sql = "SELECT * FROM receita ORDER BY idcadastro_receita DESC ";
                        $res = mysqli_query($con,$sql);
                        
                        $num_rows = mysqli_num_rows($res);
                        if($num_rows > 0){
                            while($dados = mysqli_fetch_assoc($res)){
                                echo "<tr>
                                    <h4>Nome Receita: ".$dados['nome_receita']."</h4>
                                    <h4>Lista de Ingredientes</h4>
                                    <td>".$dados['ingredientes']."</td>
                                    <h4>Modo de Preparo</h4>
                                    <td>".$dados['modo_preparo']."</td>
                                    <h4>Tempo de Preparo (minutos): ".$dados['tempo_preparo']."</h4>
                                    <h4> Quantidade de Porções: ".$dados['porcoes']."</h4>
                                    <h4>Foto</h4>
                                    <td>"?> <img src="<?php echo $dados['arquivo'] ; ?>" class="img-thumbnail" width='25%' class="img-fluid"/><?php "</td>
                                    </tr>";
                                    $seleciona = mysqli_query($con,"SELECT * FROM comentarios WHERE idcadastro_receita = '{$dados['idcadastro_receita']}' ORDER BY idcomentario DESC");
                                    $conta = mysqli_num_rows($seleciona);
                                        if($conta <=0){
                                            echo "<h4> Não há Comentários Cadastrados! </h4>";
                                        }else{
                                            echo "<h4> Comentários </h4>";
                                            while($rows = mysqli_fetch_array($seleciona)){
                                                $comentario = $rows['comentario'];
                                                $data = $rows['datacomentario'];
                                                $data2 = date('d/m/Y', strtotime($data));
                                                echo "<tr class='text-center'><td colspan='3'>$comentario</td><td colspan='3'>$data2</td></tr>";
                                            }
                                        }                                      
                                        echo "<tr>
                                        <td><a class='btn btn-outline-success' href='curtidas.php?cod=".$dados['idcadastro_receita']."'>Curtir</a>
                                        <td><a class='btn btn-outline-success' href='favoritar.php?cod=".$dados['idcadastro_receita']."'>Favoritar</a>
                                        <td><a class='btn btn-outline-success' href='comenta_receita.php?cod=".$dados['idcadastro_receita']."'>Comentar</a>
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
    </div>
    <div id ="section3">
        <div id="conteudo-1">
            <img src="img/user.png" height="40">
                <h4 class="u-text u-text-2">Quem Somos?</h4>
                    <p class="u-align-left u-text u-text-3">Somos alunas do 5º período do curso de Ciência da Computação do Instituto 
                    Federal do Sul de Minas - campus Muzambinho.
                    </p>
        </div>
        <div id="conteudo-2">
            <img src="img/site.png" height="40">
                <h4 class="u-text u-text-default u-text-4">Site</h4>
                    <p class="u-align-left u-text u-text-5">Somos um site destinado a ajudar com receitas de diversas culinárias.&nbsp;</p>
        </div>
        <div id="conteudo-3">
            <img src="img/contato.png" height="40">
                <h4 class="u-text u-text-default u-text-6">Contato</h4>
                    <p class="u-align-left u-text u-text-7">Entre em contato com a gente pelo email: 12181000395@muz.ifsuldeminas.edu.br&nbsp;</p>
        </div>
    </div>
    <div id ="section4">
        <h1>Contato</h1>
    </div>   
    <div style="position:fixed; bottom:32px; right:0px;"><a href="#" title="topo da pagina"><img src="img/topo.png" style="border:0" width="52" height="55"></a></div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script> 
</body>
</html>
<?php
    include("footer.php");
?>