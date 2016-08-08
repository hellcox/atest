<?php
/**
 * Controller
 * Name:
 * Auth:lx
 */
class IndexController extends BaseController
{
	// 方法:初始化
    public function init()
    {
    	parent::init();
    	// 设置布局文件
        // $this->setLayoutFile('test');
    }

    // 方法:index
    public function indexAction()
    {
        $this->display();

    }

    // 方法:test
    public function testAction()
    {
        $res = UserModel::model()
            ->getDb()
            ->queryAll();

        $this->assign(array('res'=>$res,));
        $this->display();

    }
    public function ajaxAction()
    {   
        $type = arPost('type');
        $res = UserModel::model()
            ->getDb()
            ->select('uid,name')
            ->where(array('type'=>$type))
            ->queryAll();

        echo json_encode($res);

    }

}