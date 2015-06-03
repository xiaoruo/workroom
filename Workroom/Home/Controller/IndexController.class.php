<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $notice     = M("notice")->order("time desc")->field("title,content")->select();
        $this->assign("notice",$notice);
        $noticeTime = M("notice")->order("time desc")->field("time")->select();
        foreach ($noticeTime as $key => $value){
            $noticeTime[$key]["time"] = date("Y-m-d",strtotime($value["time"]));
        }
        $this->assign("noticeTime",$noticeTime);
	    $this->display();
    }
}