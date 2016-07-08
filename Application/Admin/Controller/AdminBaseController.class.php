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
  }

  protected function checkLogin() {
		if(isset($_SESSION['is_login']) && $_SESSION['is_login'] =='yes') {
			//继续执行
		} elseif(isset($_COOKIE['yy_userid']) && isset($_COOKIE['yy_passwd'])) {
      //存在cookie，验证
      $admin = D('signin');
      if(!$res = $admin->checkByCookie()) {
        $this->redirect('Login/login');
      }
      $_SESSION['is_login'] ='yes';
      $_SESSION['userID'] = $_COOKIE['yy_userid'];
      $admin->updateLogInfo($_COOKIE['yy_userid']);
    } else {
			$this->redirect('Login/login');
		}
	}

  public function getUserName($id) {
    $admin = D('signin');
  }

}
