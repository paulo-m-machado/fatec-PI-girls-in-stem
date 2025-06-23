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
    <title>Sobre</title>
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
            <h1>Sobre</h1>
        </div>

        <div>

            <img src="img/logo_girlsInSTEM_out2024.png" alt="" class="cont-img">
            
        </div>

        <p>O Grupo de Pesquisas em Ciência, Tecnologia, Engenharias e Matemática (STEM) faz parte do projeto de pesquisa em Regime de Jornada Integral (RJI) da Prof. Dra. Aparecida Maria Zem Lopes, na Fatec Jahu.</p>
        <p>O tema da pesquisa é “Mulheres em Tecnologia: um estudo para estimular e desenvolver competências em STEM nas diversas etapas do ensino”.</p>
        <p>Os encontros do grupo acontecem quinzenalmente, no Laboratório do NIC – na Fatec Jahu com os integrantes que podem participar presencialmente. Os demais, costumam participar a distância, pelo Teams.</p>
        <p>As atividades do grupo envolvem desde participar da elaboração de instrumentos para coleta de dados, organização até contribuição para palestras e oficinas oferecidas aos alunos e professores, da Fatec e da comunidade acadêmica de Jaú e região.</p>
        
        <h2 class="cont-subtitulo">Objetivos gerais</h2>

        <p>O objetivo geral é desenvolver competências em STEM nas mulheres, assim como estimular e ampliar a participação feminina no mercado profissional, por meio de oficinas, ferramentas e colaboração. Além disso, espera-se estimular o trabalho em colaboração, o compartilhamento do conhecimento, a pró atividade dos alunos e o engajamento nos respectivos cursos, melhorando o aproveitamento deles nas disciplinas.</p>

        <h2 class="cont-subtitulo">Objetivos específicos</h2>

        <ul>
            <li>Orientar os alunos a realizarem pesquisa bibliográfica (sistemática)</li>
            <li>Estudar e utilizar as normas técnicas da ABNT para trabalhos científicos</li>
            <li>Identificar ferramentas (gratuitas) para apoio à pesquisa, principalmente as que possibilitam colaboração entre os pares</li>
            <li>Compreender o funcionamento das ferramentas identificadas e disseminá-las (compartilhando) por meio de plataforma Web e conteúdos criados pelo grupo aos alunos e professores da Fatec Jahu</li>
            <li>Orientar os alunos na escrita de resumos, seminários e artigos científicos;</li>
            <li>Disseminar a pesquisa realizada por meio da apresentação dos seminários, publicação dos resumos e artigos produzidos e workshops/minicursos oferecidos ao público interno e externo da Fatec Jahu (alunos e professores)</li>
        </ul>

    </div>
    
</body>
</html>