-- ----------------------------
-- 日期：2018-08-01 17:07:38
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `think_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `think_auth_group_access`
-- ----------------------------
INSERT INTO `think_auth_group_access` VALUES (1, 1);;
INSERT INTO `think_auth_group_access` VALUES (2, 2);;
INSERT INTO `think_auth_group_access` VALUES (3, 3);;
INSERT INTO `think_auth_group_access` VALUES (8, 8);;
INSERT INTO `think_auth_group_access` VALUES (9, 8);;
INSERT INTO `think_auth_group_access` VALUES (10, 8);;
INSERT INTO `think_auth_group_access` VALUES (12, 10);;

