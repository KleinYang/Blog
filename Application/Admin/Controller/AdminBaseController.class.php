<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;

class AdminBaseController extends Controller {
  public function __construct() {
    parent::__construct();
    session_start();
    $this->checkLogin();
  }

  protected function checkLogin() {
		if(isset($_SESSION['is_login']) && $_SESSION['is_login'] =='yes') {
			//继续执行
		} else {
			$this->redirect('Login/login');
		}
	}
}
