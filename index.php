<?php
    include('PDO_conexao/config_pdo.php');
    session_start();

    // puxar artigo do DB
    try {
        // verifica se tem algum artigo foi escolhido
        if(isset($_REQUEST['artigo'])){
            $sql = "SELECT * FROM artigos WHERE id_artigo = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $_REQUEST['artigo']]);
        } 
        // se não escolhe o ultimo artigo postado
        else {
            $sql = "SELECT * FROM artigos ORDER BY id_artigo DESC LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }

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
                <a href="quem-somos.html" class="menu-titulo">Quem somos</a>
            </div>

            <div>
                <a href="participantes.html" class="menu-titulo">Participantes</a>
            </div>

            <div>
                <a href="forms/contato.php" class="menu-titulo">Contato</a>
            </div>

            <!--esta div recebera a logo do projeto-->
            <a href="sobre.html" class="menu-logo">
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

        <!--esta div recebera o conteudo-->
        <div class="conteudo">

            <div class="cont-titulo">
                <h1>
                    <?= htmlspecialchars($artigo['titulo']) ?>
                </h1>
                <a href="" class="autor">
                    <div>
                        <img class="img-subtitulo" src="img/account.svg" alt="">
                    </div>
                    <p class="nome-autor">
                        <?= htmlspecialchars($autor['nome']) ?>
                    </p>
                </a>
                <!-- botão para administradores deletarem o artigo -->
                    <div class="autor">
                        <a href="salvar-artigo.php" style="font-size: 16px; padding: 4px">
                            Salvar
                        </a>
                        <?php if(isset($_SESSION['tipo'])): ?>
                            <?php if ($_SESSION['tipo'] == 'administrador'): ?>
                                <?php $_SESSION['artigo_id'] = $artigo['id_artigo'] ?>
                                <a href="deletar-artigo.php" style="font-size: 16px; padding: 4px">
                                    Deletar
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
            </div>

            <?= nl2br($artigo['conteudo']) ?>
        </div>
    </body>
</html>