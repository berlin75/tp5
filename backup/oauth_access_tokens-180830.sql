-- ----------------------------
-- 日期：2018-08-30 09:35:51
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;;
CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` int(8) unsigned DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `oauth_access_tokens`
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('7e17a9fe4f887681c4656522c9bf38195b157feb', 'newclient', 1, '2018-08-30 09:23:42', );;
INSERT INTO `oauth_access_tokens` VALUES ('a0f53cfb2ca1780d793c09f26a057e5eba25c2dd', 'newclient', 1, '2018-08-30 09:55:05', );;
INSERT INTO `oauth_access_tokens` VALUES ('ddf47ba005d08f015f9487dd0353568358b57eee', 'newclient', 1, '2018-08-29 22:23:24', );;
INSERT INTO `oauth_access_tokens` VALUES ('ea342de65ab20170cd39c6379c2b79d1b2aca504', 'newclient', 1, '2018-08-30 09:46:49', );;
INSERT INTO `oauth_access_tokens` VALUES ('f05c16977d3b6de453da4ed046b8d03e47d44290', 'newclient', 1, '2018-08-29 19:37:11', );;

