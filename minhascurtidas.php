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
            <h3 id="page_title">Curti demais :)</h3>
            <div class='row'>
                <div class='col-12'>
                    <div class='container'>
                    <?php
                        $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                        $idusuario = $_SESSION['id'];
                        $sql = "SELECT * FROM receita INNER JOIN usuario on receita.idusuario = usuario.id_usuario INNER JOIN curtidas on usuario.id_usuario = curtidas.idcadastro_usuario WHERE usuario.id_usuario = '{$idusuario}' ORDER BY receita.idcadastro_receita DESC";
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
                                }
                        }else{
                                echo "<tr class='text-center'><td colspan='3'> Você ainda não curtiu nenhuma receita! </td></tr>";
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