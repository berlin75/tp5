-- ----------------------------
-- 日期：2018-08-01 17:07:41
-- 仅用于测试和学习,本程序不适合处理超大量数据
-- ----------------------------

-- ----------------------------
-- Table structure for `think_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;;

-- ----------------------------
-- Records for `think_auth_rule`
-- ----------------------------
INSERT INTO `think_auth_rule` VALUES (1, 'admin/blog', '博文管理', 0, 1, 1, 1, '');;
INSERT INTO `think_auth_rule` VALUES (2, 'admin/blog/bloglist', '博文列表', 1, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (3, 'admin/blog/addblog', '新增博文', 1, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (4, 'admin/blog/editorblog', '修改博文', 1, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (5, 'admin/blog/deleteblog', '删除博文', 1, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (6, 'admin/cate', '栏目管理', 0, 1, 1, 2, '');;
INSERT INTO `think_auth_rule` VALUES (7, 'admin/cate/catelist', '栏目列表', 6, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (8, 'admin/cate/addcate', '新增栏目', 6, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (9, 'admin/cate/editorcate', '修改栏目', 6, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (10, 'admin/cate/deletecate', '删除栏目', 6, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (11, 'admin/flink', '链接管理', 0, 1, 1, 3, '');;
INSERT INTO `think_auth_rule` VALUES (12, 'admin/flink/addflink', '新增链接', 11, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (13, 'admin/flink/editorflink', '修改链接', 11, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (14, 'admin/flink/deleteflink', '删除链接', 11, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (15, 'admin/flink/flinklist', '链接列表', 11, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (16, 'admin/members', '用户管理', 0, 1, 1, 4, '');;
INSERT INTO `think_auth_rule` VALUES (17, 'admin/members/memberslist', '用户列表', 16, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (18, 'admin/members/addmembers', '新增用户', 16, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (19, 'admin/members/editormembers', '修改用户', 16, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (20, 'admin/members/deletemembers', '删除用户', 16, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (21, 'admin/authrule', '规则管理', 0, 1, 1, 4, '');;
INSERT INTO `think_auth_rule` VALUES (22, 'admin/authrule/authrulelist', '规则列表', 21, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (23, 'admin/authrule/addauthrule', '新增规则', 21, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (24, 'admin/authrule/editorauthrule', '修改规则', 21, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (25, 'admin/authrule/deleteauthrule', '删除规则', 21, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (26, 'admin/authgroup', '用户组管理', 0, 1, 1, 5, '');;
INSERT INTO `think_auth_rule` VALUES (27, 'admin/authgroup/authgrouplist', '用户组列表', 26, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (28, 'admin/authgroup/addauthgroup', '新增用户组', 26, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (29, 'admin/authgroup/editorauthgroup', '修改用户组', 26, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (30, 'admin/authgroup/deleteauthgroup', '删除用户组', 26, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (38, 'index/article', '前端内容页', 0, 1, 1, 0, '');;
INSERT INTO `think_auth_rule` VALUES (39, 'index/article/storeart', '收藏文章', 38, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (40, 'index/article/updown', '点赞吐槽', 38, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (41, 'index/article/star', '五星打分', 38, 1, 1, 100, '');;
INSERT INTO `think_auth_rule` VALUES (42, 'index/articlelist', '前端列表页', 0, 1, 1, 0, '');;
INSERT INTO `think_auth_rule` VALUES (43, 'index/articlelist/index', '列表页', 42, 1, 1, 100, '');;

