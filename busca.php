<?php
if (!isset($_GET['nome_receita'])) {
	header("Location: index.php");
	exit;
}
require ("conexao.php");
$nome = "%".trim($_GET['nome_receita'])."%";

$dbh = new PDO('mysql:host=localhost;dbname=site_receitas', 'root', '');

$sth = $dbh->prepare('SELECT * FROM receita WHERE nome_receita LIKE :nome_receita');
$sth->bindParam(':nome_receita', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<?php
    include("menu.php");
?>
<body>
<h2>Resultado da busca</h2>
<?php
if (count($resultados)) {
	foreach($resultados as $Resultado) {
?>
<label><?php echo "<strong>Nome da Receita: </strong>".@$Resultado['nome_receita'];?> 
<br> 
<?php echo "<strong>Categoria: </strong>".@$Resultado['modo_preparo'];?> </label>
<br> <hr/>
<?php
} } else {
?>
<label>Desculpe, não foi encontrada nenhuma receita com esse nome.</label>
<?php
}
?>
<a href="index.php" class="btn btn-outline-secondary" title="Voltar">Voltar</a></li>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<br>
<br>
<?php
    include("footer.php");
?>