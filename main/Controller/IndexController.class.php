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

    // 方法:验证码验证
    public function authCodeAction()
    {
        $eno = 0;
        if($data = arPost()):
            $code = arComp('list.session')->get('authCode');
            if($code === $data['authCode']):
                $eno = 1;
            else:
                $eno = 2;
            endif;
        endif;
        $this->assign(array('eno'=>$eno));
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