-- MySQL dump 10.16  Distrib 10.1.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u582391319_kurz
-- ------------------------------------------------------
-- Server version	10.1.24-MariaDB

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
-- Table structure for table `Chapter`
--

DROP TABLE IF EXISTS `Chapter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Chapter` (
  `IdChapter` int(11) NOT NULL AUTO_INCREMENT,
  `Numbers` int(11) NOT NULL,
  `IdStories` int(11) NOT NULL,
  `Title` text COLLATE utf8_unicode_ci NOT NULL,
  `Storie` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdChapter`),
  KEY `IdStories` (`IdStories`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chapter`
--

/*!40000 ALTER TABLE `Chapter` DISABLE KEYS */;
INSERT INTO `Chapter` VALUES (1,1,1,'1-Criando a conta','<span class=\"Apple-tab-span\" style=\"font-size: large; white-space: pre;\">	</span><font size=\"4\">Olá, aqui é Isaias Nascimento Caetano Pinto, o criador desse sites.&nbsp;</font><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Neste tutorial, vou te ensinar a como criar sua conta, para poder utilizar o site.&nbsp;</font></div><div><font size=\"4\"><br></font></div><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>1- O primeiro passo, é clicar na opção logar, assim que abrir o site:</font></div><div><font size=\"4\"><br></font></div><div><font size=\"4\"><img src=\"storiesImage/1/1/1.png\" style=\"max-width: 900px; max-height: 700px; width: auto; height: auto;\"></font></div><div><font size=\"4\"><br></font></div><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>2-O segundo passo, é cadastrar seus dados no formulário, e se quiser, carregue sua foto de perfil:</font></div><div><font size=\"4\"><br></font></div><font size=\"4\"><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/1/2.png\"></font><div><font size=\"4\"><br></font></div><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>3-E por fim, você estará em sua página de usuário</font></div><div><span class=\"Apple-tab-span\" style=\"white-space: pre;\"><font size=\"4\">	</font></span></div><font size=\"4\"><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/1/MinhaPagina.png\"></font>'),(2,2,1,'2-Criando uma nova história','<span class=\"Apple-tab-span\" style=\"white-space: pre;\">	</span>&nbsp;<font size=\"4\"> Neste capítulo vou ensinar como criar uma nova história.&nbsp;</font><div><span class=\"Apple-tab-span\" style=\"white-space:pre\"><font size=\"4\">	</font></span></div><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Primeiramente, clique em Criar nova história:</font></div><div><font size=\"4\"><br></font></div><font size=\"4\"><br><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/2/2-1.png\"></font><div><font size=\"4\"><br></font></div><div><font size=\"4\"><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Na página de criação, preencha todos os dados. A imagem da história não é obrigatória.&nbsp;</font></div><font size=\"4\"><br><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/2/2-2.png\"></font>'),(3,3,1,'3-Criando um novo capítulo','<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Para criar um novo capítulo, clique em minhas histórias, após ter criado a história, é claro.&nbsp;</div><div><br></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/1.png\"><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Após isso, clique em novo capítulo:</div><div><br></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/2.png\"><div><br></div><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Coloque o título do capítulo, e comece a escrever. OBS: Caso o editor esteja travado ou trave durante o uso, salve o que escreveu e reinicie a página(eu tentei de diversas formas arrumar isso, mas a culpa é do javascript)</div><div><div><br></div></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/3.png\"><div><br></div><div><br></div><div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>A grande ferramenta desse site está na possibilidade de carregar imagem e som. Para isso, basta clicar em carregar imagens ou sons. Clique em carregar imagens e escolha a imagem. Clique em enviar e aguarde um tempo, o menu se fechará sozinho. Não fique clicando diversas vezes em Enviar imagem, isso só deixa o processo mais lento.&nbsp;</div><div><br></div></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/3.5.png\"><div><br></div><div>Você pode mover a imagem para onde quiser, se quiser mudar ela de lugar, selecione ela, de ctrl + c e ctrl + v onde quiser, com a música é a mesma coisa.</div><div><br></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/4.png\"><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Para colocar uma música ou um som na história, clique em carregar música:</div><div><br></div><br><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/5.png\"><div><br></div><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Escolha uma música ou som que não passe de 8MB, se for maior não carrega. (Infelizmente esse servidor que uso é gratuito, e por isso, além de ser lerdo, é limitado).&nbsp;</div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Escolha o tipo de música, que pode ser uma música de fundo, ou seja, é uma música que vai ficar se repetindo infinitamente, até que outra música de fundo seja ativada.&nbsp;</div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Voz ou efeito, são sons ou música(você que escolha), que toca uma única vez após acionado.&nbsp;</div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Após clicar em enviar música, vai demorar de carregar, pois um arquivo de som pesa 10x ou mais que uma imagem, então espere o menu sumir. Após o menu sumir, você vera um quadradinho, que assim como a imagem, pode ser colado e copiado onde quiser, e quantas vezes quiser, nesse capítulo.&nbsp;</div><div><br></div><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/1/3/6.png\"><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Para testar a música, clique aqui:&nbsp;<img class=\"play(\'storiesImage/1/3/Bach - Minuet and Badinerie from Orchestral Suite No. 2 in B.mp3\',1)\" src=\"http://kurz.hol.es/play.png\" style=\"width: 13px; height: 13px;\">&nbsp;(após clicar, pode demorar um pouco, pois o servidor é lento mesmo)</div><div><br></div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>E o site é isso, aproveitem.&nbsp;</div>'),(4,1,2,'História da Quinn','Recomendo fortemente que clique aqui:&nbsp;<img class=\"play(\'storiesImage/2/1/League of Legends Music- Quinn And Valor.mp3\',1)\" src=\"play.png\" style=\"width:13px;height:13px;\"><div><br></div><br><img style=\"max-width:900px;max-height:700px;width: auto;height: auto;\" src=\"storiesImage/2/1/exercicio.jpg\"><div><br></div><div><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">Quinn e Valor são uma equipe de patrulheiros de elite. Equipados com uma besta e um par de garras, eles assumem as missões mais perigosas de sua nação, infiltrados nas entranhas do território inimigo, realizando desde um breve reconhecimento até investidas letais. O laço inquebrável deste par é mortífero no campo de batalha, deixando oponentes cegos e alvejados com flechas antes mesmo de perceberem contra quem estão lutando: não uma, mas duas lendas demacianas.</span><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">Ainda uma jovem garota, Quinn dividia a fome de aventura com seu irmão gêmeo. Eles sonhavam em se tornar cavaleiros, mas tinham uma vida sossegada e humilde nos limites rurais de Demacia. Juntos, eles imaginavam batalhas triunfantes em terras longínquas, buscando a glória para seu rei e derrotando inimigos em nome da justiça demaciana. Quando sonhar acordados deixou de satisfazer suas almas guerreiras, eles se embrenharam nas selvas, aventurando-se em busca de perigos de verdade. Uma destas missões acabou em tragédia quando um terrível acidente tornou breve a vida de seu irmão. Dominada pelo pesar, Quinn abandonou seus sonhos de cavalaria.</span><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">No aniversário de sua perda, Quinn juntou coragem para retornar à cena de tal tragédia. Para sua surpresa, ela encontrou uma águia demaciana ferida no mesmo local da morte de seu irmão - uma ave rara e bela, acreditada de estar extinta há muito tempo. Quinn pajeou o filhote até recuperar a saúde e, conforme cresciam juntos, uma profunda aproximação se formou entre os dois. Em seu novo amigo, ela via as mesmas qualidades que antes viviam em seu irmão, e a ele deu o nome de \"Valor\". Encontraram forças um no outro e, juntos, foram atrás do sonho que ela havia abandonado.</span><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">O exército de Demacia nunca antes havia visto heróis como Quinn e Valor. Suas habilidades letais rapidamente os diferenciaram dos demais de seu grupo e patente, mas muitos ainda tinham suas dúvidas. Como seria possível uma garota de família comum, mesmo com uma criatura tão poderosa a seu lado, ignorar anos de treinamento militar? Quinn e Valor provaram a si mesmos em uma missão crítica, em busca de um assassino noxiano que havia escapado de um batalhão demaciano inteiro. Quando eles o trouxeram à justiça, acabaram por receber o respeito e a admiração de sua nação. Ambos agora servem como ícones vivos e batalhadores da perseverança e força demacianas. Juntos, Quinn e Valor se colocarão à frente de qualquer que seja a ameaça a seu amado lar.</span><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">\"<em style=\"box-sizing: border-box;\">A maioria dos soldados só depende de suas armas. Poucos dependem um do outro de verdade</em>.\"</span><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><br style=\"box-sizing: border-box; color: rgb(136, 136, 136); font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-family: &quot;Signika Negative&quot;, sans-serif; font-size: 15px; color: rgb(136, 136, 136); text-align: justify; background-color: rgb(255, 255, 255);\">-- Quinn<br style=\"box-sizing: border-box;\"><br style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Fonte: League of Legends</span></span></div>');
/*!40000 ALTER TABLE `Chapter` ENABLE KEYS */;

--
-- Table structure for table `Genre`
--

DROP TABLE IF EXISTS `Genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Genre` (
  `IdGenre` int(11) NOT NULL AUTO_INCREMENT,
  `Genre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdGenre`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genre`
--

/*!40000 ALTER TABLE `Genre` DISABLE KEYS */;
INSERT INTO `Genre` VALUES (1,'Aventura'),(2,'Acao'),(3,'Drama'),(4,'LOL'),(5,'Fantasia'),(6,'Romance'),(7,'Ficcao'),(8,'Terror');
/*!40000 ALTER TABLE `Genre` ENABLE KEYS */;

--
-- Table structure for table `ImageSinopse`
--

DROP TABLE IF EXISTS `ImageSinopse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImageSinopse` (
  `IdImageSinopse` int(11) NOT NULL AUTO_INCREMENT,
  `ImagePath` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdImageSinopse`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImageSinopse`
--

/*!40000 ALTER TABLE `ImageSinopse` DISABLE KEYS */;
INSERT INTO `ImageSinopse` VALUES (1,'storiesImage/default.png'),(2,'storiesImage/2/exercicio.jpg');
/*!40000 ALTER TABLE `ImageSinopse` ENABLE KEYS */;

--
-- Table structure for table `Sinopse`
--

DROP TABLE IF EXISTS `Sinopse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sinopse` (
  `IdSinopse` int(11) NOT NULL AUTO_INCREMENT,
  `IdStories` int(11) NOT NULL,
  `Sinopse` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `IdImageSinopse` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdSinopse`),
  KEY `IdStories` (`IdStories`),
  KEY `IdImageSinopse` (`IdImageSinopse`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sinopse`
--

/*!40000 ALTER TABLE `Sinopse` DISABLE KEYS */;
INSERT INTO `Sinopse` VALUES (1,1,'Aqui explica como funciona o site, e como criar uma história passo a passo. \r\nAproveite.',1),(2,2,'Isso é só um pequeno teste mesmo. ',2);
/*!40000 ALTER TABLE `Sinopse` ENABLE KEYS */;

--
-- Table structure for table `Stories`
--

DROP TABLE IF EXISTS `Stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stories` (
  `IdStories` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Publication` datetime NOT NULL,
  `Avaliation` int(4) NOT NULL,
  `IdGenre` int(11) NOT NULL,
  `IdUserData` int(11) NOT NULL,
  PRIMARY KEY (`IdStories`),
  KEY `IdGenre` (`IdGenre`),
  KEY `IdUserData` (`IdUserData`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stories`
--

/*!40000 ALTER TABLE `Stories` DISABLE KEYS */;
INSERT INTO `Stories` VALUES (1,'Tutorial','2016-12-14 02:54:20',0,1,1),(2,'Quinn e Valor ','2016-12-17 01:16:50',0,4,1);
/*!40000 ALTER TABLE `Stories` ENABLE KEYS */;

--
-- Table structure for table `SugestionAnswer`
--

DROP TABLE IF EXISTS `SugestionAnswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SugestionAnswer` (
  `IdSugestionAnswer` int(11) NOT NULL AUTO_INCREMENT,
  `IdDestiny` int(11) NOT NULL,
  `IdSender` int(11) NOT NULL,
  `Answer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `Publication` datetime NOT NULL,
  PRIMARY KEY (`IdSugestionAnswer`),
  KEY `IdDestiny` (`IdDestiny`),
  KEY `IdSender` (`IdSender`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SugestionAnswer`
--

/*!40000 ALTER TABLE `SugestionAnswer` DISABLE KEYS */;
/*!40000 ALTER TABLE `SugestionAnswer` ENABLE KEYS */;

--
-- Table structure for table `SugestionTitle`
--

DROP TABLE IF EXISTS `SugestionTitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SugestionTitle` (
  `IdSugestionTitle` int(11) NOT NULL AUTO_INCREMENT,
  `IdDestiny` int(11) NOT NULL,
  `IdSender` int(11) NOT NULL,
  `SugestionTitle` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `IsNew` int(11) NOT NULL,
  PRIMARY KEY (`IdSugestionTitle`),
  KEY `IdDestiny` (`IdDestiny`),
  KEY `IdSender` (`IdSender`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SugestionTitle`
--

/*!40000 ALTER TABLE `SugestionTitle` DISABLE KEYS */;
/*!40000 ALTER TABLE `SugestionTitle` ENABLE KEYS */;

--
-- Table structure for table `UserData`
--

DROP TABLE IF EXISTS `UserData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserData` (
  `IdUserData` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserPassword` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `UserAge` int(4) NOT NULL,
  `UserAbout` mediumtext COLLATE utf8_unicode_ci,
  `IdUserImage` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUserData`),
  KEY `IdUserImage` (`IdUserImage`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserData`
--

/*!40000 ALTER TABLE `UserData` DISABLE KEYS */;
INSERT INTO `UserData` VALUES (1,'Isaias Nascimento Caetano Pinto','isaias022127@hotmail.com','f6c2d24d3e5c251f6f7e24a4ef007ccee619e81f',19,'Sou o criador desse site. ',1),(2,'LaimonNada','barbaralaimonnada@gmail.com','836d9362c23cf7fda705a7306351e31321009144',18,'',2);
/*!40000 ALTER TABLE `UserData` ENABLE KEYS */;

--
-- Table structure for table `UserImage`
--

DROP TABLE IF EXISTS `UserImage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserImage` (
  `IdUserImage` int(11) NOT NULL AUTO_INCREMENT,
  `ImagePath` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUserImage`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserImage`
--

/*!40000 ALTER TABLE `UserImage` DISABLE KEYS */;
INSERT INTO `UserImage` VALUES (1,'profileImages/1/14199437_829960037139936_872835106497040394_n.jpg'),(2,'profileImages/default.png');
/*!40000 ALTER TABLE `UserImage` ENABLE KEYS */;

--
-- Dumping events for database 'u582391319_kurz'
--

--
-- Dumping routines for database 'u582391319_kurz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-16 20:33:52
