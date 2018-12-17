-- ----------------------------
-- 日期：2018-08-01 17:07:22
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `cate`
-- ----------------------------
DROP TABLE IF EXISTS `cate`;;
CREATE TABLE `cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) NOT NULL DEFAULT '',
  `catekeywords` varchar(150) NOT NULL DEFAULT '',
  `catedesc` text NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '1',
  `catetype` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `cate`
-- ----------------------------
INSERT INTO `cate` VALUES (1, '大生活', '记录生活', '记录生活', 1, 0);;
INSERT INTO `cate` VALUES (2, '光影斑斓', '光影斑斓', '光影斑斓', 2, 0);;
INSERT INTO `cate` VALUES (4, '如是观', '如是观', '如是观', 3, 0);;
INSERT INTO `cate` VALUES (6, '留言本', '留言本', '留言本', 5, 1);;
INSERT INTO `cate` VALUES (7, '圈圈说', '圈圈说', '圈圈说', 4, 0);;

