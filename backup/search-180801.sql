-- ----------------------------
-- 日期：2018-08-01 17:10:56
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `search`
-- ----------------------------
DROP TABLE IF EXISTS `search`;;
CREATE TABLE `search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` char(30) NOT NULL DEFAULT '',
  `searchtimes` int(10) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `search`
-- ----------------------------
INSERT INTO `search` VALUES (1, '罗大佑', 15, 1);;
INSERT INTO `search` VALUES (2, '王菲', 12, 1);;
INSERT INTO `search` VALUES (3, '张国荣', 1, 1);;
INSERT INTO `search` VALUES (4, '李宗盛', 2, 1);;
INSERT INTO `search` VALUES (5, 'emilia', 1, 1);;
INSERT INTO `search` VALUES (6, '月半小夜曲', 1, 1);;

