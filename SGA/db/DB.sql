CREATE DATABASE  IF NOT EXISTS `SGA` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `SGA`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: SGA
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Aluno`
--

DROP TABLE IF EXISTS `Aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aluno` (
  `idAluno` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idAluno`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aluno`
--

LOCK TABLES `Aluno` WRITE;
/*!40000 ALTER TABLE `Aluno` DISABLE KEYS */;
INSERT INTO `Aluno` VALUES (1,201701,'João'),(2,201702,'Maria'),(3,201703,'José'),(4,201704,'Pedro'),(5,201705,'Marcos'),(6,201706,'Tiago'),(7,201707,'André'),(8,201708,'Filipe'),(9,201709,'Bartolomeu'),(10,201710,'Tadeu'),(11,201711,'Tomé'),(12,201712,'Zelote'),(13,201713,'Judas'),(14,201714,'Simão ');
/*!40000 ALTER TABLE `Aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Avaliacao`
--

DROP TABLE IF EXISTS `Avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Avaliacao` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `Curso_idCurso` int(11) NOT NULL,
  `Turma_idTurma` int(11) NOT NULL,
  `Aluno_idAluno` int(11) NOT NULL,
  `Nota1` float DEFAULT NULL,
  `Nota2` float DEFAULT NULL,
  `NotaFinal` float DEFAULT NULL,
  PRIMARY KEY (`idAvaliacao`),
  KEY `fk_Avaliacao_Turma1_idx` (`Turma_idTurma`),
  KEY `fk_Avaliacao_Aluno1_idx` (`Aluno_idAluno`),
  KEY `fk_Avaliacao_Curso1_idx` (`Curso_idCurso`),
  CONSTRAINT `fk_Avaliacao_Aluno1` FOREIGN KEY (`Aluno_idAluno`) REFERENCES `Aluno` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Avaliacao_Curso1` FOREIGN KEY (`Curso_idCurso`) REFERENCES `Curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Avaliacao_Turma1` FOREIGN KEY (`Turma_idTurma`) REFERENCES `Turma` (`idTurma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Avaliacao`
--

LOCK TABLES `Avaliacao` WRITE;
/*!40000 ALTER TABLE `Avaliacao` DISABLE KEYS */;
INSERT INTO `Avaliacao` VALUES (1,0,1,1,10,NULL,NULL),(2,0,1,2,7.5,NULL,NULL),(3,0,1,3,5,NULL,NULL);
/*!40000 ALTER TABLE `Avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Curso`
--

DROP TABLE IF EXISTS `Curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `Instituicao_idInstituicao` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Sigla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCurso`),
  KEY `fk_Curso_Instituicao1_idx` (`Instituicao_idInstituicao`),
  CONSTRAINT `fk_Curso_Instituicao1` FOREIGN KEY (`Instituicao_idInstituicao`) REFERENCES `Instituicao` (`idInstituicao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Curso`
--

LOCK TABLES `Curso` WRITE;
/*!40000 ALTER TABLE `Curso` DISABLE KEYS */;
INSERT INTO `Curso` VALUES (1,1,'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS','ADS'),(2,1,'SISTEMAS PARA INTERNET','SI'),(3,2,'BACHARELADO EM SISTEMAS DE INFORMAÇÃO','BSI'),(4,2,'ENGENHARIA MECATRONICA','MEC');
/*!40000 ALTER TABLE `Curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Disciplina`
--

DROP TABLE IF EXISTS `Disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Disciplina` (
  `idDisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `Professor_idProfessor` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sigla` varchar(20) DEFAULT NULL,
  `CargaHoraria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDisciplina`),
  KEY `fk_Disciplina_Professor1_idx` (`Professor_idProfessor`),
  CONSTRAINT `fk_Disciplina_Professor1` FOREIGN KEY (`Professor_idProfessor`) REFERENCES `Professor` (`idProfessor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Disciplina`
--

LOCK TABLES `Disciplina` WRITE;
/*!40000 ALTER TABLE `Disciplina` DISABLE KEYS */;
INSERT INTO `Disciplina` VALUES (1,1,'TECNOLOGIAS ATUAS NO DESENVOLVIMENTO DE SOFTWARE','TADS',80),(2,1,'SEGURANÇA DA INFORMAÇÃO','SEGURANÇA',40),(3,1,'SISTEMAS OPERACIONAIS','SO',80),(4,5,'ALGORITMOS','ALG',80);
/*!40000 ALTER TABLE `Disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instituicao`
--

DROP TABLE IF EXISTS `Instituicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instituicao` (
  `idInstituicao` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(300) NOT NULL,
  `Sigla` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idInstituicao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instituicao`
--

LOCK TABLES `Instituicao` WRITE;
/*!40000 ALTER TABLE `Instituicao` DISABLE KEYS */;
INSERT INTO `Instituicao` VALUES (1,'FACULDADES INTEGRADAS VIANNA JUNIOR','FIVJ'),(2,'INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DO SUDESTE DE MINAS GERAIS - CAMPUS JUIZ DE FORA','IF SUDESTE MG'),(3,'UNIVERSIDADE FEDERAL DE JUIZ DE FORA','UFJF'),(4,'PONTIFÍCIA UNIVERSIDADE CATÓLICA DO RIO DE JANEIRO','PUC-RIO');
/*!40000 ALTER TABLE `Instituicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Professor`
--

DROP TABLE IF EXISTS `Professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Cargo` varchar(45) DEFAULT 'PROFESSOR ASSISTENTE I',
  PRIMARY KEY (`idProfessor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Professor`
--

LOCK TABLES `Professor` WRITE;
/*!40000 ALTER TABLE `Professor` DISABLE KEYS */;
INSERT INTO `Professor` VALUES (1,'TASSIO FERENZINI MARTINS SIRQUEIRA','PROFESSOR ASSISTENTE II'),(2,'MIRIÃ DA SILVEIRA COELHO CORREA','PROFESSOR ASSISTENTE II'),(3,'TADEU MOREIRA DE CLASSE','PROFESSOR ASSISTENTE II'),(4,'CAMILLO DE LELLIS FALCAO DA SILVA','PROFESSOR ASSISTENTE I'),(5,'DAVES MARCIO SILVA MARTINS','PROFESSOR ADJUNTO I'),(6,'GILDO DE ALMEIDA LEONEL','PROFESSOR ASSISTENTE I');
/*!40000 ALTER TABLE `Professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Turma`
--

DROP TABLE IF EXISTS `Turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `Disciplina_idDisciplina` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idTurma`),
  KEY `fk_Turma_Disciplina1_idx` (`Disciplina_idDisciplina`),
  CONSTRAINT `fk_Turma_Disciplina1` FOREIGN KEY (`Disciplina_idDisciplina`) REFERENCES `Disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Turma`
--

LOCK TABLES `Turma` WRITE;
/*!40000 ALTER TABLE `Turma` DISABLE KEYS */;
INSERT INTO `Turma` VALUES (1,1,'TADS20171'),(2,3,'SO0001'),(3,2,'SEG001');
/*!40000 ALTER TABLE `Turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Resetar` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrador','tassio@tassio.eti.br',0);
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-23 15:59:00
