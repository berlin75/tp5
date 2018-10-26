<?php
namespace app\oauth2\controller;

class Resource extends CheckToken{
	public function userInfo(){
		/*
        $uid = db('oauth_access_tokens')->where("access_token",input('get.access_token'))->value("user_id");
        $user_info = db("oauth_users")->where("user_id", $uid)->field('user_id, username, avatar')->find();
        $user_info = \think\Db::view('oauth_users', 'user_id, username, avatar')
            ->view('oauth_access_tokens', 'user_id', 'oauth_access_tokens.user_id=oauth_users.user_id')
            ->where('oauth_access_tokens.access_token', input('get.access_token'))
            ->find();
        print_r($user_info);
        */
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

}
