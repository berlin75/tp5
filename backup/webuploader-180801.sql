-- ----------------------------
-- 日期：2018-08-01 17:07:48
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `webuploader`
-- ----------------------------
DROP TABLE IF EXISTS `webuploader`;;
CREATE TABLE `webuploader` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` char(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `webuploader`
-- ----------------------------
INSERT INTO `webuploader` VALUES (1, '20170626/a66979ef7c76a222bbe8178104403be7.jpg');;
INSERT INTO `webuploader` VALUES (2, '20170626/3bea5d16d5875a5a1b421da027d1e55c.jpg');;
INSERT INTO `webuploader` VALUES (3, '20170626/c3e03d65a0027f343f284a1141ab71e1.jpg');;
INSERT INTO `webuploader` VALUES (4, '20170626/d78e41317481998ae4fd8efdf0acbb85.jpg');;
INSERT INTO `webuploader` VALUES (5, '20170626/4dcdcf7af07d6650956cd38b47d3e55f.jpg');;
INSERT INTO `webuploader` VALUES (6, '20170626/2be6813c7d124f58856b3174d6c09273.jpg');;
INSERT INTO `webuploader` VALUES (7, '20170626/66d6cc4c82c2e229b148b5285b82ff2c.jpg');;
INSERT INTO `webuploader` VALUES (8, '20170626/4d94bfe9fe315784cb0d0bfc139ac275.jpg');;
INSERT INTO `webuploader` VALUES (9, '20170626/34450a9f2b174bcff37262f9677e8462.jpg');;
INSERT INTO `webuploader` VALUES (10, '20170626/ca8a02c1ac0b9e535277f62b7e31c921.jpg');;
INSERT INTO `webuploader` VALUES (11, '20170626/e6b58ae3cc33b007ebaebd6c554b3202.jpg');;
INSERT INTO `webuploader` VALUES (12, '20170626/b9f60e46cff4af2f2cd1631696a7d5b6.jpg');;
INSERT INTO `webuploader` VALUES (13, '20170722/62620e9fa1db83a0e6e56f4c6caac233.jpg');;
INSERT INTO `webuploader` VALUES (14, '20170722/143513533908b43228272007be28df8b.jpg');;
INSERT INTO `webuploader` VALUES (15, '20180801/aa25f98143edba4eb0dc81df28e8616d.jpg');;
INSERT INTO `webuploader` VALUES (16, '20180801/fd9632221b849a7c0ada058e1c84e98c.jpg');;
INSERT INTO `webuploader` VALUES (17, '20180801/a5065ad44e69c7596cbeb92e293ffdf7.jpg');;
INSERT INTO `webuploader` VALUES (18, '20180801/d4c560887747a7c1c94513404a17abf6.jpg');;
INSERT INTO `webuploader` VALUES (19, '20180801/bb3cadac78d60f4cd3b8e59599ac62cc.jpg');;

