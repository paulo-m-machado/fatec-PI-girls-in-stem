<?php
    include('config_pdo_def.php');

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "conectado com sucesso";
    } catch(PDOException $e) {
        echo "falha de conexão com banco de dados: " . $e->getMessage();
    }
?>