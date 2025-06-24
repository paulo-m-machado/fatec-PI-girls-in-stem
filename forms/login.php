<?php
session_start();
include('../PDO_conexao/config_pdo.php'); // faz a conexao por PDO

$aviso = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    try {
        // Preparar consulta segura com PDO
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if ($senha == $usuario['senha']) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];

                // verifica se o usuario é administrador
                if ($usuario['administrador']){
                    $_SESSION['tipo'] = "administrador";
                } else {
                    $_SESSION['tipo'] = "usuario";
                }

                setcookie("usuario", $usuario['nome'], time() + (86400 * 30), "/");
                // retorna para a pagina inicial quando o login der certo
                // eventualmente trocar para mandar para a pagina de perfil do usuario
                header('Location: ../index.php');
                exit;
            } else {
                $aviso = "Senha incorreta.";
            }
        } else {
            $aviso = "Usuário não encontrado.";
        }
    } catch (PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro no login: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Entrar</title>
</head>
<body>
    <div class="formulario">
        <form class="formulario-bloco" method="post">
            <div class="formulario-titulo">Entre</div>

            <div class="formulario-conjunto">
                <label for="" class="" style="text-align: center"><?= htmlspecialchars($aviso) ?></label>
            </div>

            <div class="formulario-conjunto">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>
            <div class="formulario-conjunto">
                <label for="senha" class="">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>

            <div class="formulario-botoes">
                <button type="button" onclick="javascript:window.location.href='../index.php';">Voltar</button>
                <button type="submit" id="login" name="login">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>