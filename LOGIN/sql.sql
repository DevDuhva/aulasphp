CREATE DATABASE empresa;
USE empresa;
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    fone VARCHAR(15),
    senha VARCHAR(255) NOT NULL, -- Aumentado para senhas com hash
    foto VARCHAR(30)
);
INSERT INTO usuarios (nome, email, fone, senha) VALUES
('Zé Roela', 'teste@empresa.com', '11987654321', '$2y$10$.H1ATtve.3Ga9BT6ktZX1O0UqVAUzNH/cCWnZ6l6KekEK.JycAgvO') -- senha eu123;