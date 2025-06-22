<?php
    session_start();
    include('PDO_conexao/config_pdo.php');

    // deletar artigo
    try {
        $sql = "DELETE FROM mensagens WHERE id_mensagem = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_SESSION['mensagem_id']]);

    } catch(PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao deletar mensagem: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }

    // remove o id do artigo deletado da $_SESSION
    unset($_SESSION['mensagem_id']);
    header('Location: lista-mensagens.php');
    exit;
?>

