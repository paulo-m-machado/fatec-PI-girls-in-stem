<?php
session_start();
include('../PDO_conexao/config_pdo.php'); // faz a conexao por PDO

$usr = $_REQUEST['usr'];
$aviso = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        // Preparar consulta segura com PDO
        $sql = "SELECT administrador FROM usuarios WHERE id_usuario = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $usr]);

        $status = $stmt->fetch(PDO::FETCH_ASSOC);

        if($status == 1) {
            $aviso = 'Este usuario já é administrador';
        } else {
            $sql = "UPDATE usuarios SET administrador = 1 WHERE id_usuario = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $usr]);

            header('Location: ../lista-usuarios.php');
        }

    } catch (PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao modificar usuario: " . $e->getMessage());
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
            <div class="formulario-titulo">Tornar usuario<br>em administrador?</div>

            <div class="formulario-conjunto">
                <label for="admin" class="" style="text-align: center"><?= htmlspecialchars($aviso) ?></label>
            </div>
            <div class="formulario-botoes">
                <button type="button" onclick="javascript:window.location.href='../lista-usuarios.php';">Não</button>
                <button type="submit" id="tornar-adm" name="tornar-adm">Sim</button>
            </div>
        </form>
    </div>
</body>
</html>