<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Receitas para você</title>    
    
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <img src="img/logo.png" height="80">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color:white">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:pink" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Receitas</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="index.php.#section2" style="color:bkack">Receitas</a>
                                <a class="dropdown-item" href="cadastroreceitas.php" style="color:black">Cadastrar uma Receita</a>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php.#section3" style="color:white">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php.#section4" style="color:white">Contato</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:pink" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Em Alta</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="maisfavorita.php" style="color:bkack">Favorita de Todas</a>
                                <a class="dropdown-item" href="maiscurtida.php" style="color:black">A mais Curtida dos Usuários</a>
                                <a class="dropdown-item" href="ultimacadastrada.php" style="color:black">Receita Fresquinha</a>
                            </div>
                    </li>
                    <?php if(isset($_SESSION['logado'])){?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:pink" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Perfil</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="minhasreceitas.php" style="color:black">Minhas Receitas</a>
                                <a class="dropdown-item" href="cadastroreceitas.php" style="color:black">Cadastrar uma Receita</a>
                                <a class="dropdown-item" href="minhascurtidas.php" style="color:black">Curtidas</a>
                                <a class="dropdown-item" href="#" style="color:black">Favoritas</a>
                                <a class="dropdown-item" href="logout.php" style="color:black">Sair</a>
                        </li>
                                    <?php } else{?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:pink" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" style="color:black" href="login.php">Entrar</a>
                                <a class="dropdown-item"  style="color:black"href="pessoas.php">Cadastre-se</a>
                            </div>
                    </li>
                                <?php } ?>
                            </div>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div id="divBusca">
                        <form method="GET" action="busca.php">
                            <input type="text" id="txtBusca" name ="nome_receita" placeholder="Buscar palavra chave"/>
                            <button type ="submit" id="botaobusca"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </nav>
                    <ul class="navbar-nav" id="icones">
                        <li class="nav-item">
                            <a href="#" ><i class="fa fa-facebook" style="color:blue"></i></a>
                            <a href="#" ><i class="fa fa-twitter" style="color:green"></i></a>
                            <a href="#" ><i class="fa fa-instagram" style="color:magenta"></i></a>                     
                        </li>
                    </ul>
            </div>
        </nav>    
    </header>