SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `labiii` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `labiii`;

CREATE TABLE `labiii`.`conta`(
    `id` INT(3) NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(50) NOT NULL,
    `senha` VARCHAR(1000) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `labiii`.`disciplina`(
    `id` INT(3) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE `UQ_NAME` (`name`)
) ENGINE = InnoDB;

CREATE TABLE `labiii`.`dicionario`(
    `id` INT(3) NOT NULL AUTO_INCREMENT,
    `id_disciplina` INT(3) NOT NULL,
    `palavra_ingles` VARCHAR(50) NOT NULL,
    `palavra` VARCHAR(50) NOT NULL,
    `significado` VARCHAR(1000) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE `UQ_PALAVRA` (`palavra`)
) ENGINE = InnoDB;

ALTER TABLE `dicionario` ADD CONSTRAINT `FK_ID_DISCIPLINA` FOREIGN KEY (`id_disciplina`)
    REFERENCES `disciplina`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `conta` (`id`, `usuario`, `senha`)
    VALUES ('1', 'admin', '5a1485dbbaf72635547b632282338f133a10b365ad95aad1fb197f73bdc9ba00');
INSERT INTO `disciplina` (`id`, `name`) VALUES ('1', 'Estatística Descritiva');
INSERT INTO `disciplina` (`id`, `name`) VALUES ('2', 'Estrutura de Dados');
INSERT INTO `disciplina` (`id`, `name`) VALUES ('3', 'Fundamentos de Rede');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Algorythm', 'Algoritmo', 'Um conjunto de instruções passo a passo para resolver um problema ou realizar uma tarefa.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Encapsulation', 'Encapsulamento', 'O conceito de esconder os detalhes internos de um objeto e expor apenas as interfaces necessárias para interagir com ele.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Stack', 'Pilha', 'Uma estrutura de dados linear que segue o princípio "último a entrar, primeiro a sair" (LIFO), onde os elementos são adicionados e removidos da parte superior.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Queue', 'Fila', 'Uma estrutura de dados linear que segue o princípio "primeiro a entrar, primeiro a sair" (FIFO), onde os elementos são adicionados no final e removidos do inicio.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Tree', 'Árvore', 'Estrutura de dados hierárquica composta por nós, onde cada nó tem zero ou mais nós filhos, com um nó especial chamado raiz.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Ordination', 'Ordenação', 'Processo de organizar elementos em uma determinada ordem de acordo com um critério específico.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Application', 'Aplicativo', 'Software ou programa desenvolvido para realizar tarefas específicas em um computador.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Object-Oriented', 'Orientado-a-Objeto', 'Paradigma de programação que organiza o código em torno de objetos, que são instâncias de classes e possuem propriedades e métodos.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'ADT', 'TAD', 'Tipo de Dado Abstrato é uma abstração que descreve o comportamento de um tipo de dados sem se preocupar com a implementação interna.');
INSERT INTO `dicionario`(`id_disciplina`, `palavra_ingles`, `palavra`, `significado`) VALUES (2, 'Pointer', 'Ponteiro', 'Uma variável que armazena o endereço de memória de outra variável ou objeto.');