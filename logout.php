<?php
    session_start();

    // Limpa todas as variáveis da sessão
    $_SESSION = [];

    // Se quiser destruir o cookie da sessão também
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalmente destrói a sessão
    session_destroy();

    // Remove cookie personalizado "usuario"
    setcookie("usuario", "", time() - 3600, "/");

    header('Location: index.php');
    exit;
?>

