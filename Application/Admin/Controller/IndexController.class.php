<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
header("content-type:text/html;charset=utf-8");
class IndexController extends AdminBaseController {
    public function index(){
      //var_dump($_SESSION);exit;
      $this->display();
    }
}
