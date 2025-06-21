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
        <title>Girls in STEM</title>
    </head>
    <body>

        <nav class="menu">
            <!--Aqui estao as partes relacionadas aos logins-->
            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <div class="menu-cadastro">
                    <!--esta div tera o icone do usuraio-->
                    <a href="perfil.html">
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
                    <!--esta div tera o icone do usuraio-->
                    <a href="perfil.html">
                        <img src="img/account.svg" alt="icone de usuario">
                    </a>
                    <div>
                        <a href="perfil.html">
                            <b><?= htmlspecialchars($_SESSION['usuario_nome']) ?></b>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="menu-pesquisa">
                <input type="search" name="" id="pesquisa" aria-label="Pesquisar" placeholder="Pesquise">
            </div>

            <div>
                <div class="menu-titulo">Noticias</div>
            </div>

            <div>
                <div class="menu-titulo">Artigos</div>
            </div>

            <div>
                <a href="quem-somos.html" class="menu-titulo">Quem somos</a>
            </div>

            <div>
                <a href="participantes.html" class="menu-titulo">Participantes</a>
            </div>

            <div>
                <a href="forms/contato.html" class="menu-titulo">Contato</a>
            </div>

            <!--esta div recebera a logo do projeto-->
            <a href="sobre.html" class="menu-logo">
                <div>
                    <img src="img/logo_girlsInSTEM_out2024.png" alt="logo do projeto Girls in STEM">
                </div>
                <div class="menu-titulo">Sobre</div>
            </a>
        </nav>

        <!--esta div recebera o conteudo-->
        <div class="conteudo">

            <div class="cont-titulo">
                <h1>Mulheres em STEM</h1>
                <a href="perfil-autor.html" class="autor">
                    <div>
                        <img class="img-subtitulo" src="img/account.svg" alt="">
                    </div>
                    <p class="nome-autor">Paulo Martins Machado</p>
                </a>
            </div>

            <p>
                STEM é um acrônimo que representa as áreas de Ciência, Tecnologia, Engenharia e Matemática. Esse conceito abrange um conjunto de disciplinas interconectadas que desempenham um papel fundamental no desenvolvimento de soluções inovadoras para os desafios do mundo moderno.
                O ensino e a aplicação dessas áreas visam preparar indivíduos para carreiras em setores que exigem pensamento crítico, habilidades analíticas e capacidade de resolução de problemas.
                Além disso, o movimento STEM busca estimular a curiosidade, a criatividade e o espírito empreendedor, incentivando a formação de profissionais capazes de liderar em um cenário global cada vez mais tecnológico e dinâmico.
            </p>
            <p>
                As mulheres têm conquistado cada vez mais espaço nas áreas de Ciência, Tecnologia, Engenharia e Matemática (STEM), setores historicamente dominados por homens. Embora as mulheres ainda representem uma porcentagem menor em muitas dessas áreas, o aumento da presença feminina tem sido significativo nas últimas décadas, graças a iniciativas que buscam promover a igualdade de gênero e encorajar meninas e mulheres a se interessarem por esses campos. Organizações e programas de mentoria têm desempenhado um papel crucial, ajudando a derrubar barreiras e incentivando o ingresso das mulheres no universo STEM, mostrando que elas são igualmente capazes de inovar e liderar.
            </p>
            <p>
                Além disso, o reconhecimento das mulheres pioneiras em STEM tem sido fundamental para inspirar novas gerações. Figuras como Marie Curie, Ada Lovelace, Rosalind Franklin e Katherine Johnson abriram caminho para que muitas outras mulheres seguissem suas paixões e carreiras nesses campos. No entanto, a falta de visibilidade histórica de algumas dessas mulheres, especialmente em áreas como engenharia e computação, ainda é uma questão importante a ser abordada. A valorização dessas contribuições no presente ajuda a mudar o cenário e promove a ideia de que as mulheres têm um papel ativo e essencial na evolução científica e tecnológica.
            </p>
            <p>
                Apesar dos avanços, ainda há muito a ser feito para garantir que as mulheres em STEM tenham o apoio e as oportunidades que merecem. A desigualdade salarial, a escassez de modelos femininos em posições de liderança e a falta de políticas públicas que incentivem a permanência das mulheres nessas áreas são desafios persistentes. Entretanto, a crescente mobilização de grupos feministas, a implementação de políticas inclusivas em empresas e instituições acadêmicas, além do aumento do número de mulheres em cargos de liderança e influência, são passos importantes para uma mudança significativa no panorama de gênero em STEM. O futuro de STEM é, sem dúvida, mais promissor e diversificado com a participação ativa das mulheres.
            </p>        
        </div>
    </body>
</html>