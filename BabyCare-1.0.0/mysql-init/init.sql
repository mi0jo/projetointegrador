CREATE DATABASE IF NOT EXISTS bleedwithdignity_db;
USE bleedwithdignity_db;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_confirmado BOOLEAN DEFAULT FALSE,
    Data_Nascimento DATE,
    senha VARCHAR(100) NOT NULL,
    tipo ENUM('admin', 'user') NOT NULL
);

CREATE TABLE forum_posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    autor_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data_postagem DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (autor_id) REFERENCES users(id)
);

CREATE TABLE forum_respostas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    autor_id INT NOT NULL,
    conteudo TEXT NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES forum_posts(id),
    FOREIGN KEY (autor_id) REFERENCES users(id)
);

CREATE TABLE materia (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    topico VARCHAR(100),
    autor_id INT NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (autor_id) REFERENCES users(id)
);

CREATE TABLE calendario_menstrual (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    fluxo ENUM('leve','moderado','intenso'),
    humor VARCHAR(100),
    remedios TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE forum_favoritos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (post_id) REFERENCES forum_posts(id)
);

CREATE TABLE curtidas_materias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    materia_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (materia_id) REFERENCES materia(id)
);

-- Inserção do usuário admin com senha visível (exemplo: 'admin123')
INSERT INTO users (nome, email, email_confirmado, senha, tipo) VALUES
('Administrador Geral', 'admin@sistema.com', TRUE, 'adm123', 'admin');
