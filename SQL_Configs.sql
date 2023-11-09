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

INSERT INTO `disciplina` (`id`, `name`) VALUES ('1', 'Estatística Descritiva');
INSERT INTO `disciplina` (`id`, `name`) VALUES ('2', 'Estrutura de Dados');
INSERT INTO `disciplina` (`id`, `name`) VALUES ('3', 'Fundamentos de Rede');
INSERT INTO `conta` (`id`, `usuario`, `senha`)
    VALUES ('1', 'admin', '5a1485dbbaf72635547b632282338f133a10b365ad95aad1fb197f73bdc9ba00');