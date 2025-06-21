<?php
    include('PDO_conexao/config_pdo.php');
    session_start();

    try {
        // consulta segura com PDO
        $sql = "SELECT * FROM artigos WHERE id_artigo = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => 1]);

        $artigo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $sql2 = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute([':id' => $artigo['usuario_id']]);

        $autor = $stmt2->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao carregar artigo: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }
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
                <h1>
                    <?= htmlspecialchars($artigo['titulo']) ?>
                </h1>
                <a href="perfil-autor.html" class="autor">
                    <div>
                        <img class="img-subtitulo" src="img/account.svg" alt="">
                    </div>
                    <p class="nome-autor">
                        <?= htmlspecialchars($autor['nome']) ?>
                    </p>
                </a>
            </div>

            <?= nl2br($artigo['conteudo']) ?>
        </div>
    </body>
</html>