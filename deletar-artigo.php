<?php
    session_start();
    include('PDO_conexao/config_pdo.php');

    // deletar artigo
    try {
        $sql = "DELETE FROM artigos WHERE id_artigo = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_SESSION['artigo_id']]);

    } catch(PDOException $e) {
        // Log do erro para análise do desenvolvedor
        error_log("Erro ao deletar artigo: " . $e->getMessage());
        echo "Erro no sistema. Tente novamente mais tarde.";
    }

    // remove o id do artigo deletado da $_SESSION
    unset($_SESSION['artigo_id']);
    header('Location: index.php');
    exit;
?>

