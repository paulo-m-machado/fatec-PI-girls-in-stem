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
    <title>Participantes</title>
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
        
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <div>
                <a href="logout.php" class="menu-titulo">
                    Sair
                </a>
            </div>
        <?php endif; ?>
    </nav>

    <div class="conteudo">
        <div class="cont-titulo">
            <h1>Participantes</h1>
        </div>

        <div class="lista-participantes">
            <ul>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Letícia Mandu Garcia</div>
                        <div class="lista-participantes-ocupacao">Responsável pela criação e manutenção dos conteúdos do site Girls in Stem</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
                <li>
                    <div class="lista-participantes-img-crop"><img src="img/foto-teste.jpg" alt="" class="lista-participantes-img"></div>
                    <div class="lista-participantes-texto">
                        <div class="lista-participantes-nome">Nome da silva</div>
                        <div class="lista-participantes-ocupacao">Desempregado</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>