<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// api model route
use think\Route;

Route::any(':version/doc','api/:version.doc/index');
Route::get(':version/blogs/[:page]/[:size]','api/:version.blog/index',[],['page'=>'\d+', 'size'=>'\d+']);
Route::resource(':version/blogs','api/:version.blog');
Route::get(':version/blogstest','api/:version.blog/test');

return [
    // 全局路由变量规则
    '__pattern__' => [
        'name' => '\w+',
    ],
    // 路由分组
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    //测试路由 自定义路由规则6-17 17:49
    '/' => 'index/index',
    'art/:bid' => 'article/index',
    'cate/:cid'=> 'articlelist/index',
    'tag/:tag' => 'tags/index',          //内容页和列表页标签tags功能

];
