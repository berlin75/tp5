<?php
namespace app\oauth2\controller;

class Server extends Base{
    public function authorize(){
        if(!$this->server->validateAuthorizeRequest($this->request, $this->response)) {
            return $this->response->send();
        }
        if(empty($_POST)) {
            return '
                <form method="post">
                  <label>第三方登录?</label><br />
                  <p><span>账号:</span><input type="text" name="username" value="berlin"></p>
                  <p><span>密码:</span><input type="password" name="password" value="123123" /></p>
                  <input type="submit" name="authorized" value="登录">
                </form>
            ';
        }
        $rs = db('oauth_users')->where(['username'=>input('post.username'),'password'=>input('post.password')])->find();
        if(empty($rs)) {
            return "用户名或密码错误";
        }
        $is_authorized = input('post.authorized') === '登录';
        $this->server->handleAuthorizeRequest($this->request, $this->response, $is_authorized, $rs['user_id']);
        if($is_authorized) {
            return redirect($this->response->getHttpHeader('Location'));
        }
        $this->response->send();
    }

    public function token(){
        $this->server->handleTokenRequest($this->request)->send();
    }

    // token过期后 刷新token
    public function refresh_token(){
        $this->server->addGrantType(new \OAuth2\GrantType\RefreshToken($this->storage, [
            "always_issue_new_refresh_token" => true,
            "unset_refresh_token_after_use" => true,
            "refresh_token_lifetime" => 2419200,
        ]));
        $this->server->handleTokenRequest($this->request)->send();
    }
    
    // 客户端认证模式
    public function client_credentials(){
        $this->server->addGrantType(new \OAuth2\GrantType\ClientCredentials($this->storage, [
            "allow_credentials_in_request_body" => true
        ]));
        $this->server->handleTokenRequest($this->request)->send();
    }

    /*
    // 应改成class CheckToken,所有的项目资源控制器必须继承该控制器,token验证成功再通过api获取资源
    public function resource(){
        //验证token失败
        if(!$this->server->verifyResourceRequest($this->request)) {
            $this->response->send();
            return json(['status' => -1, 'msg' => 'token error','data'=>[]]);
        }
        
        // if (!$this->server->verifyResourceRequest($this->request, $this->response, $scope)){
        //     return $this->server->getResponse ()->send();
        // }

        // $uid = db('oauth_access_tokens')->where("access_token",input('get.access_token'))->value("user_id");
        // $user_info = db("oauth_users")->where("user_id", $uid)->field('user_id, username, avatar')->find();
        // $user_info = \think\Db::view('oauth_users', 'user_id, username, avatar')
        //     ->view('oauth_access_tokens', 'user_id', 'oauth_access_tokens.user_id=oauth_users.user_id')
        //     ->where('oauth_access_tokens.access_token', input('get.access_token'))
        //     ->find();
        // print_r($user_info);
        
        $token = $this->server->getAccessTokenData($this->request);
        $user_info = db("oauth_users")->where('user_id', $token['user_id'])->field('user_id, username, avatar')->find();
        $data = [
            'status' => 1,
            'msg' => 'msg',
            'data'=> [
                'token_info'=> $token,
                'user_info'=> $user_info
            ]
        ];
        return json($data);
    }
    */
}
