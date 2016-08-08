<?php
/**
 * Controller
 * Name:A-模板文件
 * Auth:lx
 */
class AController extends BaseController
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

}