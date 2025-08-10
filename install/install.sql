-- MySQL dump 10.13  Distrib 5.6.50, for Linux (x86_64)
--
-- Host: localhost    Database: cd
-- ------------------------------------------------------
-- Server version	5.6.50-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `nteam_admin`
--

DROP TABLE IF EXISTS `nteam_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nteam_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(255) NOT NULL COMMENT '管理员账号',
  `adminPwd` char(32) NOT NULL COMMENT '管理员密码',
  `adminQq` bigint(20) DEFAULT '2322796106' COMMENT '管理员QQ',
  `adminLoginIp` varchar(15) DEFAULT NULL COMMENT '管理员IP',
  `adminRank` int(11) NOT NULL COMMENT '管理员等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nteam_admin`
--

LOCK TABLES `nteam_admin` WRITE;
/*!40000 ALTER TABLE `nteam_admin` DISABLE KEYS */;
INSERT INTO `nteam_admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',2247972582,'223.104.71.110',1);
/*!40000 ALTER TABLE `nteam_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nteam_config`
--

DROP TABLE IF EXISTS `nteam_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nteam_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SiteName` varchar(255) NOT NULL COMMENT '网站名称',
  `Name` varchar(255) NOT NULL COMMENT '顶部文字',
  `Descriptison` varchar(255) NOT NULL COMMENT '网站描述',
  `Keywords` varchar(255) NOT NULL COMMENT '网站关键词',
  `Url` varchar(255) NOT NULL COMMENT '网址',
  `Mail_Smtp` varchar(255) NOT NULL COMMENT '好友一名称',
  `Mail_Port` varchar(255) NOT NULL COMMENT '好友一QQ',
  `Mail_Name` varchar(255) NOT NULL COMMENT '好友二名称',
  `Mail_Pwd` varchar(255) NOT NULL COMMENT '好友二QQ',
  `Vaptcha_Open` int(11) NOT NULL DEFAULT '0' COMMENT '系统人机验证开关',
  `Vaptcha_Vid` varchar(88) NOT NULL COMMENT '验证码单元Vid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nteam_config`
--

LOCK TABLES `nteam_config` WRITE;
/*!40000 ALTER TABLE `nteam_config` DISABLE KEYS */;
INSERT INTO `nteam_config` VALUES (1,'刀客源码-个人主页','Chen Star Liao','刀客源码网-工作室-是一个个由几名热爱网络联合起来的一个团队，我们一直在前进，一直在进步。不管如何，我们的初心不变。','刀客源码网,星燎云,陈星燎','www.dkewl.com','马云','10001','码云','1000',0,'');
/*!40000 ALTER TABLE `nteam_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nteam_config_theme`
--

DROP TABLE IF EXISTS `nteam_config_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nteam_config_theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Index_About` varchar(255) NOT NULL COMMENT '版权',
  `Index_Services_t1` varchar(255) NOT NULL COMMENT '链接一名称',
  `Index_Services_d1` varchar(255) NOT NULL COMMENT '链接一网址',
  `Index_Services_t2` varchar(255) NOT NULL COMMENT '链接二名称',
  `Index_Services_d2` varchar(255) NOT NULL COMMENT '链接二网址',
  `Index_Services_t3` varchar(255) NOT NULL COMMENT '链接三名称',
  `Index_Services_d3` varchar(255) NOT NULL COMMENT '链接三网址',
  `Index_Services_t4` varchar(255) NOT NULL COMMENT '链接四名称',
  `Index_Services_d4` varchar(255) NOT NULL COMMENT '链接四网址',
  `Index_Qq` varchar(255) NOT NULL COMMENT '显示的QQ',
  `Index_Email` varchar(255) NOT NULL COMMENT '显示的邮箱',
  `Index_Phone` varchar(255) NOT NULL COMMENT '显示的微信二维码',
  `Index_Place` varchar(255) NOT NULL COMMENT '显示的B站链接',
  `Index_Style` varchar(800) NOT NULL COMMENT '首页自定义样式',
  `Index_Links` text NOT NULL COMMENT '首页头像链接',
  `Index_Slide1` varchar(255) NOT NULL COMMENT '首页第一行文字',
  `Index_Slide2` varchar(255) NOT NULL COMMENT '首页第二行文字',
  `Index_Slide3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nteam_config_theme`
--

LOCK TABLES `nteam_config_theme` WRITE;
/*!40000 ALTER TABLE `nteam_config_theme` DISABLE KEYS */;
INSERT INTO `nteam_config_theme` VALUES (1,'刀客源码网','测试','./','测试','./','测试','./','测试','./','10001','10001@qq.com','https://www.dmoe.cc/random.php','Baidu.com',0,'1','https://www.dmoe.cc/random.php','Chen Star Liao','陈星燎','拜过把子发过誓，这顿咋还AA制。');
/*!40000 ALTER TABLE `nteam_config_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nteam_log`
--

DROP TABLE IF EXISTS `nteam_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nteam_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(255) NOT NULL COMMENT '操作者',
  `type` varchar(255) NOT NULL COMMENT '操作内容',
  `data` varchar(255) NOT NULL COMMENT '操作时间',
  `ip` varchar(255) NOT NULL COMMENT '操作ip',
  `city` varchar(255) NOT NULL COMMENT '操作地点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nteam_log`
--

LOCK TABLES `nteam_log` WRITE;
/*!40000 ALTER TABLE `nteam_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `nteam_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cd'
--

--
-- Dumping routines for database 'cd'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-08  2:43:14
