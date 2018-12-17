-- ----------------------------
-- 日期：2018-08-30 09:35:54
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_authorization_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_authorization_codes`;;
CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` int(8) unsigned DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `oauth_authorization_codes`
-- ----------------------------
INSERT INTO `oauth_authorization_codes` VALUES ('02da921bdea88a680ccfdb317f6f065959dddcec', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 08:57:36', );;
INSERT INTO `oauth_authorization_codes` VALUES ('144a11f01d4035c30ed12a7108eed3fe73e075a2', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 09:14:21', );;
INSERT INTO `oauth_authorization_codes` VALUES ('2cdc836f489c0ddc38c044b155bdbd3e7f4b0c9b', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 09:15:01', );;
INSERT INTO `oauth_authorization_codes` VALUES ('3c3783684c5a019455acf9618e9e2aad761b4df7', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 08:50:17', );;
INSERT INTO `oauth_authorization_codes` VALUES ('47453f5efe239b3a254e25564b94452128b1cf3e', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 08:47:03', );;
INSERT INTO `oauth_authorization_codes` VALUES ('60dc564b37eab58b91993cc7f47ee1f6ebf7d7e0', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-29 18:04:31', );;
INSERT INTO `oauth_authorization_codes` VALUES ('79922830e0e5684257029c215e5f4ee6a7ec525e', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-29 18:04:43', );;
INSERT INTO `oauth_authorization_codes` VALUES ('8d1358f93cc40d38c817c287e0a98921c6e820fa', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 08:56:47', );;
INSERT INTO `oauth_authorization_codes` VALUES ('c367df35043fc03a337e23b3be3ad5d7f16370a7', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 09:05:48', );;
INSERT INTO `oauth_authorization_codes` VALUES ('e1b1fe25b4154470764c4d414f9cb9f6f15cb898', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-29 18:06:05', );;
INSERT INTO `oauth_authorization_codes` VALUES ('e66a19456a32fa9b115109de256d189300e4fb9c', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 09:15:42', );;
INSERT INTO `oauth_authorization_codes` VALUES ('f2a480f00da4a92442778991aa2c3c2ab05a1115', 'newclient', 1, 'http://localhost/tp5/oauth2/client/login', '2018-08-30 08:55:20', );;

