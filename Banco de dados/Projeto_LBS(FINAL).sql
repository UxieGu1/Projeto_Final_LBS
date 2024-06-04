CREATE TABLE `Administrador` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(255),
  `Senha` varchar(255)
);

CREATE TABLE `Usuario` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(255),
  `data_nascimento` varchar(255),
  `email` varchar(255),
  `Senha` varchar(255),
  `Plano_id` int,
  FOREIGN KEY (`Plano_id`) REFERENCES `PlanoExercicio` (`id`)
);

CREATE TABLE `Produto` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(255),
  `Descricao` text,
  `Preco` decimal
);

CREATE TABLE `PlanoExercicio` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(255),
  `Descricao` text,
  `Preco_mensal` decimal
);

CREATE TABLE `Compra` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `Usuario_id` int,
  `Produto_id` int,
  FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`id`),
  FOREIGN KEY (`Produto_id`) REFERENCES `Produto` (`id`)
);
