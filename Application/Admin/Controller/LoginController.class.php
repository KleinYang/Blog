<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
header("content-type:text/html;charset=utf-8");
class LoginController extends Controller {
    public function login(){
      $this->display();
    }

    public function signin() {
      $model_admin = D('signin');
      //var_dump($_REQUEST);
  		if ($model_admin->checkByLogin($_POST['username'], $_POST['passwd'])) {
  			//验证通过
        $_SESSION['is_login'] = 'yes';
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
}
