<?php
namespace app\admin\controller;
use PHPQrcode\Qrcode;

class Code extends \think\Controller{
	public function index(){
		return view();
	}

    public function createQrcode(){
        $result=create_qrcode();
        echo $result;
    }

    public function getQrcode(){
    	return '<img src="'.get_qrcode('hello qrcode').'" />';
    }

    // 生成带logo的二维码图片
    // 方法思路：先调用phpqrcode生成一张二维码，再使用php的image相关函数将logo图片添加到生成的二维码图片上
    public function qrcodeWithLogo(){
        // vendor('phpqrcode.phpqrcode');
        $object = new \PHPQrcode\Qrcode\QRcode();
        $text = request()->root(true);
        $level = 'L';
        $size = 6;
        $logo = ROOT_PATH.'public/static/logo.png';
        $qrcode = ROOT_PATH.'public/qrcode/qrcode.jpg';     // 存放生成原始二维码图地址
        $object->png($text, $qrcode, $level, $size, 2);     //生成一个二维码图片
        if ($logo !== FALSE) {
            $qrcode = imagecreatefromstring(file_get_contents($qrcode));
            $logo = imagecreatefromstring(file_get_contents($logo));
            $qrcode_width = imagesx($qrcode);               //二维码图片宽度
            $qrcode_height = imagesy($qrcode);              //二维码图片高度
            $logo_width = imagesx($logo);                   //logo图片宽度
            $logo_height = imagesy($logo);                  //logo图片高度
            $logo_qr_width = $qrcode_width / 5;
            $scale = $logo_width / $logo_qr_width;
            $logo_qr_height = $logo_height / $scale;
            $from_width = ($qrcode_width - $logo_qr_width) / 2;
            //重新组合图片并调整大小
            imagecopyresampled($qrcode, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                $logo_qr_height, $logo_width, $logo_height);
        }
        $savepath = "/public/qrcode/qrcodeWithLogo.png";
        imagepng($qrcode, ROOT_PATH.$savepath);             //输出图片
        echo '<img src="'.request()->root(true).$savepath.'">';
    }

    // public function test(){
    //     new \PHPQrcode\Qrcode\QRcode();die;
    //     $value = "http://www.baidu.com";//二维码内容
    //     $errorCorrectionLevel = 'L';//容错级别
    //     $matrixPointSize = 10;//生成图片大小

    //     $time=date("y-m");
    //     $com = date("d");
    //     $dir="Data/Qrcode/".$time .'/'. $com;
    //     //生成二维码图片
    //     if(!file_exists($dir)){
    //         //如果不创建，递归创建
    //         mkdir($dir,0777,true);
    //     }
    //     $file_name = $dir."/" . date("YmdHis").mt_rand(1000,9999).".png";
    //     Qrcode\QRcode::png($value, $file_name, $errorCorrectionLevel, $matrixPointSize, 2);
    //     $logo = "logo.png";//准备好的logo图片
    //     $QR = $file_name;//已经生成的原始二维码图
    //     if ($logo !== FALSE) {
    //         $QR = imagecreatefromstring(file_get_contents($QR));
    //         $logo = imagecreatefromstring(file_get_contents($logo));
    //         $QR_width = imagesx($QR);//二维码图片宽度
    //         $QR_height = imagesy($QR);//二维码图片高度
    //         $logo_width = imagesx($logo);//logo图片宽度
    //         $logo_height = imagesy($logo);//logo图片高度
    //         $logo_qr_width = $QR_width / 5;
    //         $scale = $logo_width/$logo_qr_width;
    //         $logo_qr_height = $logo_height/$scale;
    //         $from_width = ($QR_width - $logo_qr_width) / 2;
    //         //重新组合图片并调整大小
    //         imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,$logo_qr_height, $logo_width, $logo_height);
    //     }
    //     //输出图片
    //     //header("Content-type: image/png");
    //     //imagepng($QR);
    //     //imagepng($QR);
    //     echo $file_name;
    // }

    public function endroid(){
		$qrCode = new \Endroid\QrCode\QrCode('http://www.baidu.com');
		header('Content-Type: '.$qrCode->getContentType());
		echo $qrCode->writeString();
		exit;
    }

    public function endroidWithLogo(){
    	$set_log = true;
        $qrCode = new \Endroid\QrCode\QrCode('http://baidu.com');
        if($set_log ==true){
            $qrCode->setLogoPath(ROOT_PATH.'public/static/logo.png');
            $qrCode->setLogoWidth(90);
        }
        $qrCode->setErrorCorrectionLevel(\Endroid\QrCode\ErrorCorrectionLevel::HIGH);
        $name = rand(1,99999999).time();
        $path = ROOT_PATH.'public/qrcode/'.$name.'.png'; 
        $qrCode->writeFile($path);
        header('Content-Type: '.$qrCode->getContentType());
        echo $qrCode->writeString();
        //@去操作这张图片
        //@删除文件
        unlink($path);
        exit;
    }

}
