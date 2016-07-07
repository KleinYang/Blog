<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Think\Log;
class IndexController extends AdminBaseController {
  public function index(){
    $this->display();
  }

  public function category() {
    $this->display();
  }

  public function categoryList() {
    $categoryList = M('category');
    $categoryArray[data] = $categoryList->select();
    // var_dump($categoryArray);
    echo json_encode($categoryArray);
  }
}
