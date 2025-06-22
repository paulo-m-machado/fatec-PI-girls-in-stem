<?php
    session_start();
    include('../PDO_conexao/config_pdo.php'); // faz a conexao por PDO
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!isset($_SESSION['usuario_id'])) {
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $usuarioId = null;
        } else {
            $nome = $_SESSION['usuario_nome'];
            $email = $_SESSION['usuario_email'];
            $usuarioId = $_SESSION['usuario_id'];
        }
        $conteudo = $_POST['mensagem'];

        unset($sql, $stmt, $executou);
        
        try {
            $sql = "INSERT INTO mensagens (usuario_id, email, nome, conteudo) 
                    VALUES (:usuario_id, :email, :nome, :conteudo)";
            $stmt = $conn->prepare($sql);
            $executou = $stmt->execute([
                ':usuario_id' => $usuarioId,
                ':email' => $email,
                ':nome' => $nome,
                ':conteudo' => $conteudo
            ]);
            if($executou) {
                $_SESSION['msg'] = "Mensagem enviada com sucesso!";
                $_SESSION['msg_type'] = 'success';
            } else {
                $_SESSION['msg'] = "Erro ao enviar mensagem. Tente novamente.";
                $_SESSION['msg_type'] = 'error';
            }

            $voltar--;
        } catch (PDOException $e) {
            error_log("Erro ao enviar mensagem: " . $e->getMessage());
            $_SESSION['msg'] = "Erro no sistema. {$e}";
            $_SESSION['msg_type'] = 'error';
        }        
    }

    $msg = $_SESSION['msg'] ?? '';
    $msg_type = $_SESSION['msg_type'] ?? '';
    $old = $_SESSION['old'] ?? [];

    unset($_SESSION['msg'], $_SESSION['msg_type']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Contato</title>
</head>
<body>
    <div class="formulario">
        <form class="formulario-bloco" method="post">

            <?php if ($msg): ?>
            <div class="msg <?= htmlspecialchars($msg_type) ?>">
                <?= htmlspecialchars($msg) ?>
            </div>
            <?php endif; ?>

            <div class="formulario-titulo">Contato</div>

            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <div class="formulario-conjunto">
                    <label for="nome" class="">Nome:</label>
                    <input type="text" name="nome" id="">
                </div>
                <div class="formulario-conjunto">
                    <label for="Email" class="">Email:</label>
                    <input type="email" name="email" id="">
                </div>
            <?php endif; ?>

            <div class="formulario-conjunto">
                <label for="mensagem" class="">Mensagem:</label>
                <input type="text" name="mensagem" id="formulario-contato-msg" required>
            </div>

            <div class="formulario-botoes">
                <button type="button" onclick="javascript:window.location.href='../index.php';">Voltar</button>
                <?php if ($_SESSION['tipo'] == 'administrador'): ?>
                    <button type="button" onclick="location.href='lista-usuarios.php'">Ver<br>mensagens</button>
                <?php endif; ?>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>