<?php
namespace Test\Model;
use Think\Model;
class LoginModel extends Model {
  public function checkByLogin($admin_name, $admin_pass) {
		//形成SQL
		$sql = "select * from user where username='$admin_name' and passwd=md5('$admin_pass')";
		//执行
		$result = M()->query($sql);
    return (bool)$result;
	}
}
?>
