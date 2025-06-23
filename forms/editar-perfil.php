<?php
    session_start();
    include('../PDO_conexao/config_pdo.php');

    try{
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_SESSION['usuario_id']]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao carregar perfil: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $telefone = preg_replace('/\D/', '', $_POST['telefone']);

        $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $executou = $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':id' => $usuario['id_usuario']
        ]);
        /*
        $stmt2->bindValue(':nome', $nome);
        $stmt2->bindValue(':email', $email);
        $stmt2->bindValue(':telefone', $telefone);
        $stmt2->bindValue(':id', $usuario['id_usuario']);
        
        $executou = $stmt2->execute();
        */
        if($executou) {
            header('Location: ../perfil.php');
        } else {
            $_SESSION['msg'] = "Erro ao editar usuário. Tente novamente.";
            $_SESSION['msg_type'] = 'error';   
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar perfil</title>
</head>
<body>
    <div class="formulario">

        <form class="formulario-bloco" method="post">
            <div class="formulario-titulo">Editar pefil</div>

            <div class="formulario-conjunto">
                <label for="nome" class="">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>" required autofocus>
            </div>
            <div class="formulario-conjunto">
                <label for="telefone" class="">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($usuario['telefone'] ?? '') ?>">
            </div>
            <div class="formulario-conjunto">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" required>
            </div>

            <div class="formulario-botoes">
                <button type="button" onclick="javascript:window.history.back();">Voltar</button>
                <button type="submit" name="cadastrar" id="cadastrar">Editar</button>
            </div>
        </form>
    </div>
</body>
</html>