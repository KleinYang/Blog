<?php
namespace User\Model;
use Think\Model;
class UserModel extends Model {
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

  public function checkByCookie() {
    $user_id = $_COOKIE['yy_userid'];
    $passwd = $_COOKIE['yy_passwd'];
    $sql = "SELECT * FROM user WHERE user_id = $user_id AND md5(concat('e10ui', passwd, '3ug0x')) = '$passwd'";
    //执行
    $result = M()->query($sql)[0];
    return (bool)$result;
  }

  public function distroyLogInfo() {
    setcookie("yy_passwd", "", time()-3600, '/');
    setcookie("yy_userid", "", time()-3600, '/');
    @session_start();
    session_destroy();
  }

  public function updateLogInfo($id) {
    $ip = $_SERVER["REMOTE_ADDR"];
    $time = date("Y-m-d H:i:s", time());
    $sql = "UPDATE `user` SET `user_ip`='$ip', `login_time`='$time' WHERE (`user_id`=$id)";
    $result = M()->execute($sql);
  }

}
?>
