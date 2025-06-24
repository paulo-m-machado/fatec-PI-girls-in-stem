<?php
    session_start();
    include('../PDO_conexao/config_pdo.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $telefone = preg_replace('/\D/', '', $_POST['telefone']);
        $senha = $_POST['senha'];
        $confirmaSenha = $_POST['confirma-senha'];

        $_SESSION['old'] = [
            'nome' => $nome,
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone']
        ];

        if (!$nome) {
            $_SESSION['msg'] = "Por favor, informe seu nome.";
            $_SESSION['msg_type'] = 'error';
        } elseif (!$email) {
            $_SESSION['msg'] = "Email inválido.";
            $_SESSION['msg_type'] = 'error';
        } elseif (strlen($senha) < 5) {
            $_SESSION['msg'] = "A senha deve ter pelo menos 5 caracteres.";
            $_SESSION['msg_type'] = 'error';
        } elseif ($senha != $confirmaSenha) {
            $_SESSION['msg'] = "As senhas estão diferentes.";
            $_SESSION['msg_type'] = 'error';
        } else {
            try {
                $sqlCheck = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
                $stmtCheck = $conn->prepare($sqlCheck);
                $stmtCheck->execute([':email' => $email]);
                        $_SESSION['msg'] = "Erro ao criar usuário. Tente novamente.";
                        $_SESSION['msg_type'] = 'error';
                if ($stmtCheck->fetchColumn() > 0) {
                    $_SESSION['msg'] = "Email já cadastrado.";
                    $_SESSION['msg_type'] = 'error';
                } else {

                    $sql = "INSERT INTO usuarios (nome, email, telefone, senha, administrador) 
                            VALUES (:nome, :email, :telefone, :senha)";
                    $stmt = $conn->prepare($sql);
                    $executou = $stmt->execute([
                        ':nome' => $nome,
                        ':email' => $email,
                        ':telefone' => $telefone,
                        ':senha' => $senha
                    ]);
                    if ($executou) {
                        $_SESSION['msg'] = "Registro criado com sucesso! Você já pode fazer login";
                        $_SESSION['msg_type'] = 'success';
                        unset($_SESSION['old']);                                               
                    } else {
                        $_SESSION['msg'] = "Erro ao criar usuário. Tente novamente.";
                        $_SESSION['msg_type'] = 'error';
                    }
                }
            } catch (PDOException $e) {
                error_log("Erro no registro: " . $e->getMessage());
                $_SESSION['msg'] = "Erro no sistema. {$e}";
                $_SESSION['msg_type'] = 'error';
            }
        }
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // Exibir formulário e mensagens
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
    <title>Cadastro</title>
</head>
<body>
    <div class="formulario">


        <form class="formulario-bloco" method="post">
            <div class="formulario-titulo">Cadastre-se</div>

            <div class="formulario-conjunto">
                <?php if ($msg): ?>
                    <label style="text-align: center">
                        <?= htmlspecialchars($msg) ?>
                    </label>
                <?php endif; ?>
            </div>

            <div class="formulario-conjunto">
                <label for="nome" class="">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($old['nome'] ?? '') ?>" required autofocus>
            </div>
            <div class="formulario-conjunto">
                <label for="telefone" class="">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($old['telefone'] ?? '') ?>">
            </div>
            <div class="formulario-conjunto">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
            </div>
            <div class="formulario-conjunto">
                <label for="senha" class="">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <div class="formulario-conjunto">
                <label for="confirma-senha" class="">Confirmar senha:</label>
                <input type="password" name="confirma-senha" id="confirma-senha" required>
            </div>

            <div class="formulario-botoes">
                <button type="button" onclick="javascript:window.location.href='../index.php';">Voltar</button>
                <button type="submit" name="cadastrar" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>