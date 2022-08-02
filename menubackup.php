<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas para você</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    
    <link rel="stylesheet" href="css/estilo.css">

    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
</head>

<body>
    <header>
        <input type ="checkbox" name ="" id ="chk1">
        <div class="logo"><img src="img/logo.png" height="80"></div>
            <div class="search-box">
                <form method="GET" action="busca.php">
                    <input type ="text" name ="nome_receita" id ="srch" placeholder="Pesquisar">
                    <button type ="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <ul>
                <li><a href="#section1">Home</a></li>
                <li><a href="#section2">Receitas</a>
                    <ul>
                        <li><a href="receitascadastradas.php">Receitas</a>
                        <li><a href="cadastroreceitas.php">Cadastrar uma Receita</a>
                    </ul>
                </li>
                <li><a href="#section3">Quem Somos</a></li>
                <li><a href="#section4">Contato</a></li>
                <?php if(isset($_SESSION['logado'])){?>
                    <li><a href="#">Perfil</a>
                    <ul>
                        <li><a href="minhasreceitas.php">Minhas Receitas</a>
                        <li><a href="cadastroreceitas.php">Cadastrar uma Receita</a>
                        <li><a href="#">Curtidas</a>
                        <li><a href="#">Favoritas</a>
                        <li><a href="logout.php">Sair</a>
                    </ul>
                    </li>
                <?php } else{?>
                    <li><a href="login.php">Login</a></li>
                <?php } ?>
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>                     
                </li>
            </ul>
            <div class="menu">
                <label for="chk1">
                    <i class="fa fa-bars"></i>
                </label>
            </div>        
    </header>