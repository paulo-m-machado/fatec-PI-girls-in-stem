<?php
    include('PDO_conexao/config_pdo.php');
    session_start();

    // puxar artigo do DB
    try {
        // consulta segura com PDO
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_SESSION['usuario_id']]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao carregar perfil do usuario: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Noticias</title>
</head>
<body>

    <nav class="menu">
            <!--Aqui estao as partes relacionadas aos logins-->
            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <div class="menu-cadastro">
                    <!--esta div tera o icone do usuraio-->
                    <a href="perfil.php">
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

    <div class="conteudo">
        <div class="cont-titulo">
            <h1>Lista de artigos</h1>
        </div>
        <div>
            <div class="lista-salvos">
                <ul>
                    <li>
                        <ul>
                            <?php
                                try{
                                    $sql = "SELECT * FROM artigos WHERE tipo = 'Noticia'";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    $listaArtigos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($listaArtigos as $art){
                                        echo"
                                        <li>
                                            <a href='index.php?artigo={$art['id_artigo']}'> {$art['titulo']} </a>
                                        </li>
                                        ";
                                    }
                                } catch(PDOException $e) {
                                    // Log do erro para análise do desenvolvedor
                                    error_log("Erro ao carregar artigos: " . $e->getMessage());
                                    echo "Erro no sistema. Tente novamente mais tarde.";
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>