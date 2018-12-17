<?php
/**
 cmd> php think make:controller api/v1/Blog
 
 DROP TABLE IF EXISTS `think_blog`;
 CREATE TABLE IF NOT EXISTS `think_blog` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
    `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
    `content` text COMMENT '内容',
    `author` int(10) UNSIGNED NOT NULL COMMENT '作者',
    `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '记录创建时间',
    `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '记录更新时间',
    `delete_time` timestamp NULL DEFAULT NULL COMMENT '软删除时间',
    `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '数据状态',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='博客表';

Route::resource(':version/blogs','api/:version.blog');
 */

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\api\model\Blog as Blogs;

class Blog extends Controller{
    protected function get_json(){
        $input = file_get_contents('php://input');
        return json_decode($input, true);
    }

    protected $_auth = false;
    protected $_visitor = null;

    protected function auth(){
        if (input('?server.PHP_AUTH_USER') && input('?server.PHP_AUTH_PW')){
            $result = db('think_members')
                    ->where('username', input('server.PHP_AUTH_USER'))
                    ->where('password', md5(input('server.PHP_AUTH_PW')))
                    ->find();
            if ($result){
                $this->_auth = true;
                $this->_visitor = $result['uid'];
            }
        }
        // var_dump(input('server.PHP_AUTH_USER'), input('server.PHP_AUTH_PW'), $this->_auth);
    }

    /**
     * 显示资源列表
     * @return \think\Response
     * 结果过滤
     */
    public function index($page = 1, $size = 10){ 
        try {
            $blogs = new Blogs;
            $list = $blogs->page($page, $size)->select();
            return json($list);
        } catch (Exception $e) {
            return json(["error"=>$e->getMessage()], 500);
        } 
    }

    /**
     * 显示创建资源表单页.
     * @return \think\Response
     */
    public function create(){
        //
    }

    /**
     * 保存新建的资源
     * @param  \think\Request  $request
     * @return \think\Response
     curl -vX POST -d "name=thinkphp&title=new thinkphpTitle&content=new thinkphpContent" http://localhost/tp5/v1/blogs
     curl -u admin:admin -i -X POST -d {\"name\":\"name\",\"title\":\"title\",\"content\":\"content\"} http://localhost/tp5/v1/blogs
     */
    public function save(Request $request){ 
        $this->auth();
        if (!$this->_auth)
            return json(['error'=>'You must enter a valid username & password'],401,['WWW-Authenticate' => 'Basic realm=\"Authenticate\"']);
        $jsondata = $this->get_json();
        if (is_null($jsondata))  return json('BAD REQUEST', 400);
        $validate = validate('Blog');
        if(!$validate->check($jsondata)){
           return json($validate->getError(), 422);
        }
        $jsondata['author'] = $this->_visitor;var_dump($jsondata);
        try {
            $result = Blogs::create($jsondata);
            return json($result, 201);
        } catch (Exception $e) {
            return json(["error"=>$e->getMessage()], 500);
        }
    }

    /**
     * 显示指定的资源
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id){
        try {
            $data = Blogs::get($id);
            return json($data);
        } catch (Exception $e) {
            return json(["error"=>$e->getMessage()], 500);
        }
    }

    /**
     * 显示编辑资源表单页.
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id){
        //
    }

    /**
     * 保存更新的资源
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     curl -i -X PUT -d {\"content\":\"newcontent\"} http://localhost/tp5/v1/blogs/7
     curl -i -u admin:admin -X PUT -d {\"content\":\"newcontent\"} http://localhost/tp5/v1/blogs/1
     */
    public function update(Request $request, $id){ 
        $this->auth();
        if (!$this->_auth)
            return json(['error'=>'You must enter a valid username & password'],401,['WWW-Authenticate' => 'Basic realm=\"Authenticate\"']);
        $jsondata = $this->get_json();
        if (is_null($jsondata))  return json('BAD REQUEST', 400);
        $blog = Blogs::get($id);
        if (!$blog) return json(["error"=>"NOT FOUND"], 404);
        if ($blog->author !== $this->_visitor) return json(["error"=>"Forbidden"], 403);
        $data = [
            'name'  => isset($jsondata['name']) ? $jsondata['name'] : $blog->name,
            'title' => isset($jsondata['title']) ? $jsondata['title'] : $blog->title,
            'content' => isset($jsondata['content']) ? $jsondata['content'] : $blog->content
        ];
        $validate = validate('Blog');
        if(!$validate->check($data)) return json($validate->getError(), 422);
        try {
            $result = Blogs::update($data, ['id'=>$id]);
            return json($result);
        } catch (Exception $e) {
            return json(["error"=>$e->getMessage()], 500);
        }
    }

    /**
     * 删除指定资源
     * @param  int  $id
     * @return \think\Response
     curl -i -u admin:admin -X DELETE http://localhost/tp5/v1/blogs/1
     */
    public function delete($id){
        $this->auth();
        if (!$this->_auth)
            return json(['error'=>'You must enter a valid username & password'],401,['WWW-Authenticate' => 'Basic realm=\"Authenticate\"']);
        if (!request()->isDelete()) return json(["error"=>"Method Not Allowed"], 405);
        if (!$id) return json(["error"=>"id required"], 400);
        $blog = Blogs::get($id);
        if (!$blog) return json(["error"=>"NOT FOUND"], 404);
        if ($blog->author !== $this->_visitor) return json(["error"=>"Forbidden"], 403);
        try {
            $blog->delete();
            return json([], 204);
        } catch (Exception $e) {
            return json(["error"=>$e->getMessage()], 500);
        }
        
    }

    public function test(){
        return view();
    }
}
