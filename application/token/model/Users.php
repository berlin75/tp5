<?php
namespace app\token\model;

class Users extends \think\Model{
	protected $table = 'token_users';
}

/*
1: 首先在数据库的 users 表中添加两个字段
1): token 用于存储用户的 token
2): time_out 用于设置用户 token 的过期时间

drop tables if exists `token_users`;
CREATE TABLE `token_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `token` char(40) NOT NULL DEFAULT '',
  `time_out` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
insert into token_users (`username`, `password`, `token`, `time_out`)values("admin", "90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad", "b93b9a8110248ce046b52bcf2f95896610895195", 1540385822);
*/