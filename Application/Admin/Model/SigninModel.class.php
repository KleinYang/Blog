<?php
namespace Admin\Model;
use Think\Model;
class SigninModel extends Model {
  public function checkByLogin($admin_name, $admin_pass) {
		//形成SQL
		$sql = "select * from user where username='$admin_name' and passwd=md5('$admin_pass')";
		//执行
		$result = M()->query($sql)[0];
    return $result;
	}

  public function checkByCaptcha($captcha) {
    return strtoupper($captcha) == strtoupper($_SESSION['captcha_str']);
  }
}
?>
