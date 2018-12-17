-- ----------------------------
-- 日期：2018-08-01 17:07:45
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `think_members`
-- ----------------------------
DROP TABLE IF EXISTS `think_members`;;
CREATE TABLE `think_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `tel` varchar(11) NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `birthday` char(15) NOT NULL DEFAULT '',
  `email` char(20) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned DEFAULT NULL,
  `loginip` varchar(30) DEFAULT '',
  `logincount` int(11) NOT NULL DEFAULT '0',
  `score` int(10) unsigned NOT NULL DEFAULT '10',
  `regtime` int(10) NOT NULL,
  `typeof` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `storeart` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `think_members`
-- ----------------------------
INSERT INTO `think_members` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', 1532962137, '0.0.0.0', 52, 10, 0, 1, 0, '4,5,28,25');;
INSERT INTO `think_members` VALUES (3, 'berlin', 'd35a02eb49149450fb2fffc6e467eb37', '', '', '', '', 1532962041, '0.0.0.0', 6, 10, 0, 1, 0, '');;
INSERT INTO `think_members` VALUES (2, 'heiying', '45a527d9abccda821c550f4763a92828', '', '', '', '', 1502288312, '0.0.0.0', 1, 10, 0, 1, 0, '');;
INSERT INTO `think_members` VALUES (8, 'zhangsan', '01d7f40760960e7bd9443513f22ab9af', '15107384431', '', '', '', 1498726417, '0.0.0.0', 0, 10, 0, 0, 0, '');;
INSERT INTO `think_members` VALUES (9, 'wangwu', '9f001e4166cf26bfbdd3b4f67d9ef617', '15107384432', '', '', '', 1498668518, '0.0.0.0', 0, 10, 0, 0, 0, '');;
INSERT INTO `think_members` VALUES (12, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', '', '', '', '', , '', 0, 10, 1498999561, 1, 0, '');;

