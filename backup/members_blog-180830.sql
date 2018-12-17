-- ----------------------------
-- 日期：2018-08-30 09:35:48
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `members_blog`
-- ----------------------------
DROP TABLE IF EXISTS `members_blog`;;
CREATE TABLE `members_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `bid` int(10) unsigned NOT NULL,
  `updown` tinyint(1) DEFAULT '-1',
  `star` tinyint(1) DEFAULT '0',
  `comment` text,
  `commenttime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `members_blog`
-- ----------------------------
INSERT INTO `members_blog` VALUES (1, 1, 28, -1, 5, '<p>来自admin的评论</p>', 1502286390);;
INSERT INTO `members_blog` VALUES (2, 3, 28, -1, 0, '<p>来自berlin的评论</p>', 1502286431);;
INSERT INTO `members_blog` VALUES (3, 2, 28, -1, 0, '<p>来自heiying的评论</p>', 1502288336);;
INSERT INTO `members_blog` VALUES (4, 1, 25, 1, 4, , );;

