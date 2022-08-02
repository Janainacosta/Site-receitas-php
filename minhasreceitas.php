<?php session_start();
    include_once("conexao.php");
    $_SESSION['pagina'] = "minhasreceitas.php";
?>
<?php 
if(!$_SESSION['logado']){
    echo "<script>alert('Ambiente restrito. Favor fazer login para acessar.');window.location='login.php'</script>";
}
?><!DOCTYPE html>
<html lang= 'pt-br'>
<head>
<?php
include("menu.php");
?>
</head>
    <body>
        <main>
            <h3 id="page_title">Minhas Receitas Cadastradas</h3>
            <div class='row'>
                <div class='col-12'>
                    <div class='container'>
                    <?php
                        $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                        $idusuario = $_SESSION['id'];
                        $sql = "SELECT * FROM receita WHERE idusuario = '{$idusuario}' ORDER BY idcadastro_receita DESC";
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
                                        <td><a class='btn btn-outline-warning' href='altera_receita.php?cod=".$dados['idcadastro_receita']."'>Alterar</a>
                                        <a class='btn btn-outline-danger' href='exclui_receita.php?cod=".$dados['idcadastro_receita']."'>Excluir</a></td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>      
    </body>
</html>
<?php
    include("footer.php");
?>