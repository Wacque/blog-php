# Host: localhost  (Version: 5.5.53)
# Date: 2020-07-14 22:44:30
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "post"
#

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `html` text,
  `create_time` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) unsigned DEFAULT NULL,
  `cate_id` int(11) unsigned DEFAULT NULL,
  `image_list` text,
  `deleted` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "post"
#

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'hello11111111111111',NULL,'<p>hello2222222222222222</p>',1118201674,1594735452960,1,NULL,NULL),(2,'hello',NULL,'<p>hello</p>',1118219666,1118219666,1,NULL,NULL),(3,'hello',NULL,'<p>hello</p>',1118236924,1118236924,1,NULL,NULL),(4,'hello',NULL,'<p>hello</p>',1118256899,1118256899,1,NULL,NULL);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
