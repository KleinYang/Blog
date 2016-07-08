<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
use Common\Controller\CaptchaToolController;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function login(){
      $this->display();
    }

    public function signin() {
      $model_admin = D('signin');
      //var_dump($_REQUEST);
      if(!$model_admin->checkByCaptcha($_POST['captcha'])) {
        $this->assign("error", '验证码错误');
        $this->assign("waitSecond", 2);
        $this->assign("jumpUrl", "Login/login");
        $this->display('Public:error');
        exit();
      }
  		if ($user = $model_admin->checkByLogin($_POST['username'], $_POST['passwd'])) {
  			//验证通过
        if(isset($_POST['rememberme'])&&$_POST['rememberme']=='1'){
          setcookie('yy_userid', $user['user_id'], PHP_INT_MAX, '/');
          setcookie('yy_passwd', md5('e10ui'.$user['passwd'].'3ug0x'), PHP_INT_MAX, '/');
        }
        $_SESSION['is_login'] = 'yes';
        $_SESSION['userID'] = $user['user_id'];
        $model_admin->updateLogInfo($user['user_id']);
        $this->redirect('Index/index');
  		} else {
  			//非法用户
        $error = <<<HTML
<HTML>
 <HEAD>
  <TITLE> 提示：账户或密码错误 </TITLE>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html ;charset=utf-8">
  <META HTTP-EQUIV="Refresh" CONTENT='1; url="{:U("Login/login")}"'>
 </HEAD>
 <BODY>
	账户或密码错误,请两秒后重试……
 </BODY>
</HTML>
HTML;
      $this->show($error);
  		}
    }

    public function captcha() {
      $tool_captcha = new CaptchaToolController;
      $tool_captcha->generate();
    }

    public function logout() {
      $user = D('Signin');
      $user->distroyLogInfo();
      $this->redirect('Index/index');
    }
}
