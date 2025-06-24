CREATE DATABASE IF NOT EXISTS gstem;

USE gstem;

CREATE TABLE IF NOT EXISTS usuarios(
    id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    telefone VARCHAR(20),
    sobre VARCHAR(255),
    foto VARCHAR(255),
    notificacao BOOLEAN,
    administrador BOOLEAN
);

CREATE TABLE IF NOT EXISTS artigos(
    id_artigo BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario_id  BIGINT UNSIGNED NOT NULL,
    titulo VARCHAR(255),
    data_publicacao DATETIME,
    conteudo TEXT,
    tipo ENUM('Artigo', 'Noticia', 'Evento') NOT NULL DEFAULT ('Artigo'),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

CREATE TABLE IF NOT EXISTS mensagens(
    id_mensagem BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario_id BIGINT UNSIGNED,
    email VARCHAR(255) NOT NULL,
    nome VARCHAR(255),
    conteudo TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario)
);

INSERT INTO `usuarios`(`nome`, `email`, `senha`, `telefone`, `sobre`, `foto`, `notificacao`, `administrador`) 
VALUES ('teste','teste@gmail.com','12345','14999999999','nada','[value-7]',false,true);

INSERT INTO `usuarios`(`nome`, `email`, `senha`, `telefone`, `sobre`, `foto`, `notificacao`, `administrador`) 
VALUES ('outro teste','testeOutro@gmail.com','12345','14999999999','nada','[value-7]',false,false);