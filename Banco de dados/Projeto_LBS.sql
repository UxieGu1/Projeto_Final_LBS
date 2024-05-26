CREATE TABLE `Administrador` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `senha` varchar(255)
);

CREATE TABLE `Usuario` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `senha` varchar(255),
  `plano_id` int
);

CREATE TABLE `Produto` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255),
  `descricao` text,
  `preco` decimal
);

CREATE TABLE `Compra` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `usuario_id` int,
  `produto_id` int,
  `quantidade` int,
  `total` decimal,
  `data_compra` datetime
);

CREATE TABLE `PlanoExercicio` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(255),
  `descricao` text,
  `preco_mensal` decimal
);

ALTER TABLE `Usuario` ADD FOREIGN KEY (`plano_id`) REFERENCES `PlanoExercicio` (`id`);

ALTER TABLE `Compra` ADD FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

ALTER TABLE `Compra` ADD FOREIGN KEY (`produto_id`) REFERENCES `Produto` (`id`);
