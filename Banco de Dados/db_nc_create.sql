CREATE DATABASE  IF NOT EXISTS `db_nc`;
USE `db_nc`;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email_UNIQUE` (`email`)
);

DROP TABLE IF EXISTS `checklist`;
CREATE TABLE `checklist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FK_usuario_email` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_usuario_email_idx` (`FK_usuario_email`),
  CONSTRAINT `FK_usuario_email` FOREIGN KEY (`FK_usuario_email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE
);

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `area` varchar(100) DEFAULT NULL,
  `pergunta` varchar(300) DEFAULT NULL,
  `observacoes` varchar(300) DEFAULT NULL,
  `resultado` varchar(20) DEFAULT NULL,
  `FK_id_checklist` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_id_checklist_idx` (`FK_id_checklist`),
  CONSTRAINT `FK_id_checklist` FOREIGN KEY (`FK_id_checklist`) REFERENCES `checklist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `nao_conformidades`;
CREATE TABLE `nao_conformidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FK_id_checklist_nc` int DEFAULT NULL,
  `projeto` varchar(100) DEFAULT NULL,
  `artefato` varchar(100) DEFAULT NULL,
  `ja_ocorreu` varchar(20) DEFAULT NULL,
  `classificacao` varchar(20) DEFAULT NULL,
  `acao_corretiva` varchar(300) DEFAULT NULL,
  `FK_id_pergunta` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `FK_id_checklist_idx` (`FK_id_checklist_nc`),
  KEY `FK_id_pergunta_idx` (`FK_id_pergunta`),
  CONSTRAINT `FK_id_checklist_nc` FOREIGN KEY (`FK_id_checklist_nc`) REFERENCES `checklist` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_id_pergunta` FOREIGN KEY (`FK_id_pergunta`) REFERENCES `itens` (`id`) ON DELETE CASCADE
);

