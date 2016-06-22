<?php
namespace Test\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
      $this->display('login');
    }

    public function login() {
      $model_admin = D('login');
      //var_dump($_REQUEST);
  		if ($model_admin->checkByLogin($_POST['username'], $_POST['passwd'])) {
  			//验证通过
        $this->display('index');
  		} else {
  			//非法用户
        $this->display('error');
  		}
    }
}
