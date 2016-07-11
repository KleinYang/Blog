<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
class IndexController extends AdminBaseController {
  public function index(){
    $user_id = $_SESSION['userID'];
    $user = M('user');
    $userInfo = $user->where("user_id=$user_id")->select()[0];
    $this->assign('software', $_SERVER['SERVER_SOFTWARE']);
    $this->assign('phpversion', PHP_VERSION);
    $this->assign('phpos', PHP_OS);
    $this->assign('userInfo', $userInfo);
    $this->assign('mysqlversion', mysql_get_server_info());
    $this->assign('upload', get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件");
    $this->assign('ip', $_SERVER["REMOTE_ADDR"]);
    $this->assign('maxtime', get_cfg_var("max_execution_time")."秒 ");
    $this->assign('timezone', date_default_timezone_get());
    $this->assign('port', $_SERVER['SERVER_PORT']);
    $this->assign('title', '首页');
    $this->display();
  }

  public function category() {
    $this->assign('title', '分类管理');
    $this->display();
  }

  public function categoryList() {
    $categoryList = M('category');
    $categoryArray[data] = $categoryList->select();
    echo json_encode($categoryArray);
  }
}
