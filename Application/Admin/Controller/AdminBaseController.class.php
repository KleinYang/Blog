<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;

class AdminBaseController extends Controller {
  public function __construct() {
    parent::__construct();
    @session_start();
    $this->checkLogin();
    $this->assign('username', $this->getUserName());
  }

  protected function checkLogin() {
		if(isset($_SESSION['is_login']) && $_SESSION['is_login'] =='yes') {
			//继续执行
		} elseif(isset($_COOKIE['yy_userid']) && isset($_COOKIE['yy_passwd'])) {
      //存在cookie，验证
      $user = D('user');
      if(!$res = $user->checkByCookie()) {
        $this->redirect('Login/login');
      }
      $_SESSION['is_login'] ='yes';
      $_SESSION['userID'] = $_COOKIE['yy_userid'];
      $user->updateLogInfo($_COOKIE['yy_userid']);
    } else {
			$this->redirect('Login/login');
		}
	}

  public function getUserName() {
    $user = M('user');
    $id = $_SESSION['userID'];
    return $user->where("user_id=$id")->select()[0]['username'];
  }

}
