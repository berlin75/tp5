-- ----------------------------
-- 日期：2018-08-01 17:07:26
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `flink`
-- ----------------------------
DROP TABLE IF EXISTS `flink`;;
CREATE TABLE `flink` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '',
  `urldesc` varchar(255) NOT NULL DEFAULT '',
  `urlpath` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `flink`
-- ----------------------------
INSERT INTO `flink` VALUES (2, '百度', '百度', 'https://www.baidu.com');;
INSERT INTO `flink` VALUES (3, '淘宝', '淘宝', 'http://www.taobao.com');;
INSERT INTO `flink` VALUES (4, '腾讯', '腾讯', 'http://www.qq.com');;
INSERT INTO `flink` VALUES (1, 'thinkphp', 'thinkphp', 'http://www.thinkphp.cn/');;
INSERT INTO `flink` VALUES (5, 'blog', 'tp3.2.3-blog', 'http://localhost/blog');;
INSERT INTO `flink` VALUES (6, '今日头条', '今日头条', 'http://www.toutiao.com/');;
INSERT INTO `flink` VALUES (7, 'thinkall', 'thinkall', 'http://localhost/thinkall');;
INSERT INTO `flink` VALUES (8, 'thinkgroup', 'thinkgroup', 'http://localhost/thinkgroup');;
INSERT INTO `flink` VALUES (9, '站长工具', '站长工具', 'http://tool.chinaz.com/');;
INSERT INTO `flink` VALUES (10, 'bootstrap', 'bootstrap', 'http://v3.bootcss.com/');;
INSERT INTO `flink` VALUES (11, 'layui', 'layui', 'http://www.layui.com/demo/');;

