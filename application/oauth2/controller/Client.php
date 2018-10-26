<?php
namespace app\oauth2\controller;

class Client extends \think\Controller{
    const AUTH_CODE_URL = "http://localhost/tp5/oauth2/server/authorize";
    const ACCESS_TOKEN_URL = "http://localhost/tp5/oauth2/server/token";
    const REDIRECT_URI = 'http://localhost/tp5/oauth2/client/login';       //成功授权后的回调地址
    const RESOURCE_URL = "http://localhost/tp5/oauth2/resource/userInfo";
    const APP_ID = "newclient";    //应用的APPKEY
    const APP_SECRET = "newpass";  //应用密钥

    public static function getAuthorizeUrl($param = []){
        $params = [
            'response_type'=>'code',
            'client_id'=>isset($param['appid'])?$param['appid']:SELF::APP_ID,
            'redirect_uri'=>isset($param['redirect_uri'])?$param['redirect_uri']:SELF::REDIRECT_URI,
            'state'=>$param['state'],
        ];
        return SELF::AUTH_CODE_URL.'?'.http_build_query($params);
    }

    public static function getToken($param = []){
        $params = [
            'grant_type'=>'authorization_code',
            'client_id'=>isset($param['appid'])?$param['appid']:SELF::APP_ID,
            'client_secret'=>isset($param['app_secret'])?$param['app_secret']:SELF::APP_SECRET,
            'redirect_uri'=>isset($param['redirect_uri'])?$param['redirect_uri']:SELF::REDIRECT_URI,
            'code'=>$param['code'],
        ];
        return self::post(SELF::ACCESS_TOKEN_URL, $params);
    }

    public static function getResource($param = []){
        $params = ['access_token' => $param['access_token']];
        $openid_url = SELF::RESOURCE_URL.'?'.http_build_query($params);
        return self::get($openid_url);
    }

    public function login(){
        if(!input('?code')){
            //state参数用于防止CSRF攻击，成功授权后回调时会原样带回
            $state = md5(uniqid(rand(), TRUE));
            session('state', $state);
            $authorze_url = self::getAuthorizeUrl([ 'state' => $state ]);
            return redirect($authorze_url);
        }
        if(input('state') !== session('state')){
            return $this->error("csrf...");
        }
        //Step2：通过Authorization Code获取Access Token
        if(session('?token') && session('token_expire_at')>time()){
            $token = session('token');
        }else{
            $token = self::getToken([ 'code'=> input('code') ]);
        }
        //Step3：使用Access Token来获取用户的OpenID
        if(empty($token['access_token'])){
            return $this->error('token error...');
        }
        session('token', $token);
        session('token_expire_at', $token['expires_in']+time());
        $user_info = self::getResource($token);
        var_dump($user_info);
    }
    
    // get请求
    public static function get($url,array $header_options = []){
        $ch = curl_init();
        $curl_options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,           //返回原生的（Raw）输出
            CURLOPT_HEADER => 0,
            CURLOPT_TIMEOUT => 120,                //超时时间
            CURLOPT_FOLLOWLOCATION => 1,           //是否允许被抓取的链接跳转
            CURLOPT_HTTPHEADER => $header_options,
            CURLOPT_SSL_VERIFYPEER => false,       // 对认证证书来源的检查
            CURLOPT_ENCODING=>'gzip,deflate',
        ];
        curl_setopt_array($ch, $curl_options);
        $res = curl_exec($ch);
        $data = json_decode($res,true);
        if(json_last_error() != JSON_ERROR_NONE){
            $data = $res;
        }
        curl_close($ch);
        return $data;
    }
    
    // post 请求
    public static function post($url, array $param = [], array $header = []){
        $ch = curl_init();
        $post_param = [];
        if(is_array($param)) {
            $post_param = http_build_query($param);
        }else if(is_string($param)) { 
            $post_param = $param;
        }
        $curl_options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,        //返回原生的（Raw）输出
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_FOLLOWLOCATION => 1,        //是否允许被抓取的链接跳转
            CURLOPT_POST => 1,                  //POST
            CURLOPT_POSTFIELDS => $post_param,  //post数据
            CURLOPT_TIMEOUT => 120,             //超时时间
            CURLOPT_SSL_VERIFYPEER => false,    // 对认证证书来源的检查
            CURLOPT_ENCODING=>'gzip,deflate'
        ];
        // debug 1
        // curl_setopt($ch,CURLINFO_HEADER_OUT,1);
        // curl_setopt($ch,CURLOPT_HEADER,1);
        // debug 2 详细的请求过程
        // curl_setopt($ch,CURLOPT_VERBOSE,true);
        // curl_setopt($ch,CURLINFO_HEADER_OUT,0);
        // curl_setopt($ch,CURLOPT_HEADER,0);
        // curl_setopt($ch,CURLOPT_VERBOSE,true);
        // $fp = fopen('php://temp', 'rw+');
        // curl_setopt($ch,CURLOPT_STDERR,$fp);
        curl_setopt_array($ch, $curl_options);
        $res = curl_exec($ch);
        // $debug_info = rewind($fp) ? stream_get_contents($fp):"";
        // $debug_info = curl_getinfo($ch);
        //  print_r($debug_info);
        $data = json_decode($res, true);
        if(json_last_error() != JSON_ERROR_NONE){
            $data = $res;
        }
        curl_close($ch);
        return $data;
    }

}
