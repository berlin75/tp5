<?php
namespace app\oauth2\controller;

class Base extends \think\Controller{
	public function _initialize(){ 
        $config = config('database');
        $this->storage = new \OAuth2\Storage\Pdo(['dsn' =>"mysql:dbname={$config['database']};host=localhost", 'username' => $config['username'], 'password' => $config['password']]);
        $this->server = new \OAuth2\Server($this->storage);
        $this->server->addGrantType(new \OAuth2\GrantType\ClientCredentials($this->storage));
        $this->server->addGrantType(new \OAuth2\GrantType\AuthorizationCode($this->storage));
        $this->request = \OAuth2\Request::createFromGlobals();
        $this->response = new \OAuth2\Response();
    }

}