<?php session_start();
    include_once("conexao.php");
    $_SESSION['pagina'] = "minhasreceitas.php";
?>
<!DOCTYPE html>
<html lang= 'pt-br'>
<head>
<?php
include("menu.php");
?>
</head>
    <body>
        <main>
            <h3 id="page_title">Receita mais Favorita de Todos os Tempos</h3>
            <div class='row'>
                <div class='col-12'>
                    <div class='container'>
                    <?php
                        $cod = (isset($_GET['cod'])) ? $_GET['cod'] : "null";
                        $sql = "SELECT * FROM receita ORDER BY quantidadefavorita desc limit 1";
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
                                echo "<tr class='text-center'><td colspan='3'> Nenhuma Receita Cadastrada Ainda! </td></tr>";
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