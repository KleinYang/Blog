<?php
namespace Common\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
class CaptchaToolController extends Controller{
  /**
   * 生成验证码方法
   */
  public function generate() {
    $rand_bg_file = "./Public/images/captcha/captcha_bg" . mt_rand(1,5) . '.jpg';
    //创建画布
    $img = @imagecreatefromjpeg($rand_bg_file);
    //画布是否创建成功
    if(!$img) {
      echo '画布创建失败';
    }
    //绘制边框
    $white = imagecolorallocate($img, 0xff, 0xff, 0xff);
    //不填充矩形
    imagerectangle($img, 0, 0, 144, 19, $white);

    //写码值
    $chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ23456789';
    $captcha_str = '';
    for ($i=0, $strlen=strlen($chars); $i < 4; $i++) {
      $rand_key = mt_rand(0,$strlen-1);
      $captcha_str .= $chars[$rand_key];
    }
    //保存在session中
    @session_start();
    $_SESSION['captcha_str'] = $captcha_str;

    //确定背景色，白色黑色随机
    $black = imagecolorallocate($img, 0x00, 0x00, 0x00);
    if(mt_rand(0,1)==1) {
      $str_color = $white;
    }else {
      $str_color = $black;
    }

    //写字符串
    imagestring($img, 5, 60, 3, $captcha_str, $str_color);

    //展示图片
    header('Content-Type:image/jpeg;charset:utf-8;');
    imagejpeg($img);
    // var_dump($_SESSION['captcha_str']);
    //销毁资源
    imagedestroy($img);
  }
}
