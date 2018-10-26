-- ----------------------------
-- 日期：2018-08-01 17:07:35
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `think_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `think_auth_group`
-- ----------------------------
INSERT INTO `think_auth_group` VALUES (1, '超级管理', 1, '1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25');;
INSERT INTO `think_auth_group` VALUES (2, '普通管理', 1, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,17,19,34,35');;
INSERT INTO `think_auth_group` VALUES (3, '编辑', 1, '1,2,3,4,5,19,34,35');;
INSERT INTO `think_auth_group` VALUES (4, '钻石会员', 0, '1,2,7,15,19');;
INSERT INTO `think_auth_group` VALUES (5, '金牌会员', 0, '');;
INSERT INTO `think_auth_group` VALUES (6, '银牌会员', 0, '');;
INSERT INTO `think_auth_group` VALUES (7, '铜牌会员', 0, '');;
INSERT INTO `think_auth_group` VALUES (8, '普通会员', 1, '');;
INSERT INTO `think_auth_group` VALUES (10, '后台测试', 1, '');;
INSERT INTO `think_auth_group` VALUES (11, '游客', 1, '');;

