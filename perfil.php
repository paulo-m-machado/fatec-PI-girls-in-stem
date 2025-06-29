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
    <title>Perfil</title>
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
        <div>
            <!-- incluir novamente dps de fazer sistema de imagens
            <div class="img-perfil-crop">
                <img src="img/foto-teste.jpg" alt="" class="img-perfil">
            </div>
             -->
            <div class="perfil-titulo">
                <h1>
                    <?= htmlspecialchars($usuario['nome']) ?>
                </h1>
                <a href="forms/editar-perfil.php" style="font-size: 16px; color: #656565">
                    Editar perfil 
                </a>
                <?php if(isset($_SESSION['tipo'])): ?>
                    <?php if($_SESSION['tipo'] == 'administrador'): ?>
                        <a href="lista-usuarios.php" style="font-size: 16px; color: #656565">
                            / Lista de usuarios
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <div>
            <div class="lista-salvos">
                <ul>
                    <!-- 
                    <li>
                        <ul>
                            <h2> Artigos Salvos</h2>
                            <li>Inovações Tecnológicas: Como a Inteligência Artificial Está Transformando as Ciências e Engenharia</li>
                            <li>A Importância da Diversidade de Gênero em Profissões de STEM: Desafios e Oportunidades</li>
                        </ul>
                    </li>
                     -->
                    <li>
                        <ul>
                            <h2>Artigos escritos</h2>
                            <?php
                                try{
                                    $sql = "SELECT * FROM artigos where usuario_id = :id";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute([':id' => $_SESSION['usuario_id']]);

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