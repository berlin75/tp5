<?php
namespace app\oauth2\controller;

class CheckToken extends Base{
	public function _initialize(){
		parent::_initialize();
		//验证token失败
        if(!$this->server->verifyResourceRequest($this->request)) {
            $this->response->send();
            return json(['status' => -1, 'msg' => 'token error','data'=>[]]);
        }
        // if (!$this->server->verifyResourceRequest($this->request, $this->response, $scope)){
        //     return $this->server->getResponse ()->send();
        // }
	}

}
