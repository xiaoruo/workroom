<?php
namespace Home\Controller;
use Think\Controller;
class IntroduceController extends Controller{
    public function index(){
        
        /**
            分页变量
        */
        //$pageNow          = 1;                                  //当前页
        //$pageSize         = 10;                                 //每页显示数量
        //$start            = ($pageNow-1)*$pageSize;             //开始
        //判断有没有通过logo点击查找方向的
        $study_find       = empty($_GET["study_find"])==TRUE?"":$_GET["study_find"];
        //判断有没有通过表单填写搜索工作室名称的
        $workroomName     = empty($_POST["workroomName"])==TRUE?"":$_POST["workroomName"];
        if($workroomName){
            //如果工作室名称存在，则按照全站查找搜索工作室名称
            //$rowCount     = M("view_introduce")->where("workroomName like '%{$workroomName}%'")->count();
            $workroom_msg = M("view_introduce")->where("workroomName like '%{$workroomName}%'")->select();
            $searchMsg    = $workroomName;
        }else if($study_find){
            //如果study_find存在，则代表查看点击logo查看的工作室信息，比如点击web就按web的学习方向进行搜索
            //$rowCount     = M("view_introduce")->where("study like '%{$study_find}%'")->count();
            $workroom_msg = M("view_introduce")->where("study like '%{$study_find}%'")->select();
            $searchMsg    = $study_find;
        }else{
            //如果workroomName和study_find都存在的话，代表查看全部的工作室信息
            //$rowCount     = M("view_introduce")->count();
            $workroom_msg = M("view_introduce")->select();
            $searchMsg    = "全部";
        }
        foreach ($workroom_msg as $key => $value) {
                $study    = explode("、", $value["study"]);
                $workroom_msg[$key]["direct"] = $study;
        }
        //$a = json_encode($workroom_msg);
        //echo $a;
        $pageCount        = ceil($rowCount/$pageSize);
        //判断workroom_msg是否有内容
        if($workroom_msg){
            //print_r($workroom_msg);
            //$this->assign("pageNow",$pageNow);
            //$this->assign("pageCount",$pageCount);
            $this->assign("a",$a);
            $this->assign("workroom_msg",$workroom_msg);
            $this->assign("searchMsg",$searchMsg);
        }

        $this->display();
    }
    /*
        提交反馈、意见
    */
    public function suggest(){
        
        //判断是否是表单提交
        if(IS_POST){
            $name        = $_POST["name"];
            $call_method = $_POST["call_method"];
            $problem     = $_POST["problem"];
            $code        = $_POST["code"];
            $trueCode    = $_SESSION["trueCode"];
            //判断验证码是否正确
            if($code == $trueCode){
                $data    = array(
                        "name"        => $name,
                        "call_method" => $call_method,
                        "problem"     => $problem
                    );
                $updateRowNum = M("suggest")->add($data);
                if($updateRowNum){
                    $this->redirect("Introduce/index",null,0.01,"<script>alert('反馈上传，您的意见已经提交成功');</script>");
                }else{
                    $this->redirect("Introduce/index",null,0.01,"<script>alert('您的意见上传失败，请重新尝试');</script>");
                }
            }else{
                $this->redirect("Introduce/index",null,0.01,"<script>alert('验证码输入错误');</script>");
            }
        }else{
            $this->redirect("Introduce/index",null,0.01,"<script>alert('不能直接访问');</script>");
        }
    }
    /*
        投递简历
    */
    public function resume(){
        $messageId = empty($_GET["messageId"])==TRUE?"":$_GET["messageId"];
        //判断是否是通过投递简历的链接过来的
        if($messageId){
            //如果是的话
            $class = M("class")->select();
            $this->assign("class",$class);
            $this->assign("messageId",$messageId);
            $this->display();
        }else{
            //如果不是的话
            $this->redirect("Index/index",null,0.01,"<script>alert('非法访问');</script>");
        }
        
    }
    /*
        对投递简历操作进行检查
    */
    public function join_check(){
        //判断是否是表单提交
        if(IS_POST){
            //如果是正常的表单提交的话
            $code         = $_POST["code"];
            $messageId    = $_POST["hidden"];
            //判断验证码
            if($code == $_SESSION["trueCode"]){
                $number       = $_POST["number"];
                //先判断学号是否存在，要是已经存在了，证明该学生已经投递过简历了，不允许再次提交简历
                $result       = M("join")->where("number={$number} and messageId={$messageId}")->field("id")->find();
                //如果判断出已经投递过该工作室了
                if($result){
                    $this->redirect("Introduce/index",null,0.01,"<script>alert('您已经像该工作室投递过简历，不能再次投递');</script>");
                }else{
                    //判断是否投了三次了
                    $joinCount    = M("join")->where("number={$number}")->count();
                    if($joinCount>=3){
                        $this->redirect("Introduce/index",null,0.01,"<script>alert('您已经投递三次了，不能再次投递');</script>");
                    }else{
                        $name         = $_POST["name"];
                        $classId      = $_POST["class"];
                        $qq           = $_POST["QQ"];
                        $sex          = $_POST["sex"];
                        $oldStudy     = $_POST["oldStudy"];
                        $joinResult   = $_POST["joinResult"];
                        $instructions = $_POST["instructions"];
                        $future       = $_POST["future"];
                        $data         = array(
                                "messageId"     => $messageId,
                                "name"          => $name,
                                "classId"       => $classId,
                                "number"        => $number,
                                "sex"           => $sex,
                                "qq"            => $qq,
                                "oldStudy"      => $oldStudy,
                                "joinResult"    => $joinResult,
                                "instructions"  => $instructions,
                                "future"        => $future
                            );
                        //var_dump($data);
                        $updateRowNum = M("join")->add($data);
                        //die();
                        if($updateRowNum){
                            $this->redirect("Introduce/index",null,0.01,"<script>alert('简历已经投递成功');</script>");
                        }else{
                            //$this->redirect("Introduce/resume",array("messageId"=>$messageId),0.01,"<script>alert('简历投递失败，尝试重新投递');</script>");
                        }
                    }
                }
                
            }else{
                $this->redirect("Introduce/resume",array("messageId"=>$messageId),0.01,"<script>alert('验证码错误');</script>");
            }
        }else{
            //如果不是表单正常提交，只是手写URL的话
            $this->redirect("Introduce/index",null,0.01,"<script>alert('非法操作');</script>");;
        }
    }
}