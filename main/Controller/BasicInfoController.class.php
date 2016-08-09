<?php
/**
 * Controller
 * Author:lx
 * Name:基本信息 - BasicInfo
 */
class BasicInfoController extends BaseController
{
	// 方法:初始化
    public function init()
    {
    	// 设置布局文件
        // $this->setLayoutFile('test');
    }

    // 方法:index
    public function indexAction()
    {
        $this->display();
    }

    // 方法:session
    public function sessionAction()
    {
        $user = arComp('list.session')->get('user');
        $this->assign(array('session'=>$user));
        $this->display();
    }

}