<?php
    include('PDO_conexao/config_pdo.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Quem somos</title>
</head>
<body>

    <nav class="menu">
        <!--Aqui estao as partes relacionadas aos logins-->
        <?php if (!isset($_SESSION['usuario_id'])): ?>
            <div class="menu-cadastro">
                <!--esta div tera o icone do usuraio-->
                <a href="">
                    <img src="img/account.svg" alt="icone de usuario">
                </a>
                <div>
                    <a href="forms/cadastro.php" class="menu-titulo">
                        Cadastre-se
                    </a>
                </div>
                <div>
                    <a href="forms/login.php" class="menu-titulo">
                        Entre
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="menu-cadastro">
                <a href="perfil.php">
                    <img src="img/account.svg" alt="icone de usuario">
                </a>
                <div>
                    <a href="perfil.php" class="menu-titulo">
                        <b><?= htmlspecialchars($_SESSION['usuario_nome']) ?></b>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <div>
            <div class="menu-titulo">
                <a href="lista-noticias.php">Noticias</a>
            </div>
        </div>

        <div>
            <div class="menu-titulo">
                <a href="lista-artigos.php">Artigos</a>
            </div>
        </div>

        <div>
            <a href="quem-somos.php" class="menu-titulo">Quem somos</a>
        </div>

        <div>
            <a href="participantes.php" class="menu-titulo">Participantes</a>
        </div>

        <div>
            <a href="forms/contato.php" class="menu-titulo">Contato</a>
        </div>

        <!--esta div recebera a logo do projeto-->
        <a href="sobre.php" class="menu-logo">
            <div>
                <img src="img/logo_girlsInSTEM_out2024.png" alt="logo do projeto Girls in STEM">
            </div>
            <div class="menu-titulo">Sobre</div>
        </a>
        
        <?php if(isset($_SESSION['usuario_id'])): ?>
            <div>
                <a href="logout.php" class="menu-titulo">
                    Sair
                </a>
            </div>
        <?php endif; ?>
    </nav>
    
    <div class="conteudo">
        <div class="cont-titulo">
            <h1>Quem somos</h1>
        </div>

        <div class="QS-card">
            <div class="QS-card-img-crop">
                <img src="img/devs/paulo.png" alt="" class="QS-card-img">
            </div>
            <div class="QS-card-text">
                <div class="QS-card-text-nome">Paulo Martins Machado</div>
                <div class="QS-card-text-ocupacao">Estudante FATEC - Jahu</div>
            </div>
        </div>

        <div class="QS-card">
            <div class="QS-card-img-crop">
                <img src="img/devs/yasmin.jpeg" alt="" class="QS-card-img">
            </div>
            <div class="QS-card-text">
                <div class="QS-card-text-nome">Yasmin Sanchez Ouvinhas</div>
                <div class="QS-card-text-ocupacao">Estudante FATEC - Jahu</div>
            </div>
        </div>
    </div>
</body>
</html>