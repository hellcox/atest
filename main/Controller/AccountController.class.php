<?php
/**
 * Controller
 * Author:lx
 * Name:账户-Account
 */
class AccountController extends ArController
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

    // 方法:登陆
    public function loginAction()
    {   
        if(!arModule('Lib.Auth')->isLoginIn()):
            if($data = arPost()):
                $name = $data['name'];
                $password = md5($data['password']);
                if($name && $password):
                    // 查询用户
                    $user = UserModel::model()
                        ->getDb()
                        ->where(array('name'=>$name,'password'=>$password))
                        ->queryRow();
                    // 写入session
                    if($user):
                        arComp('list.session')->set('user',$user);
                        $this->redirectSuccess('Index/index','登录成功！');
                    else:
                        $this->redirectError('Account/login','用户名或密码错误！');
                    endif;
                else:
                    $this->redirectError('Account/login','用户名或密码为空！');
                endif;
            endif;
        else:
            $this->redirectError('Index/index','你已经登录！');
        endif;

        $this->display();
    }

    // 方法:注册
    public function registerAction()
    {
        if(arModule('Lib.Auth')->isLoginIn()):
            $this->redirectError('Index/index','已经登录，不能进行注册！');
        endif;
        if($data = arPost()):
            // 检测用户名和密码是否为空
            if($data['name'] && $data['password'] && $data['check_password']):
            else:
                $this->redirectError('Account/register','用户名或密码为空！');
            endif;
            // 检测密码是否输入一致
            if($data['password']===$data['check_password']):
                // 检测用户名是否被注册
                $user = UserModel::model()
                    ->getDb()
                    ->where(array('name'=>$data['name']))
                    ->queryRow();
                if($user):
                    $this->redirectError('Account/register','该用户名已被注册！');
                else:
                    // 数据处理
                    $data['password'] = md5($data['password']);
                    // 插入数据
                    $eno = UserModel::model()
                        ->getDb()
                        ->insert($data,true);
                    if($eno):
                        $this->redirectSuccess('Account/login','注册成功！');
                    else:
                        $this->redirectError('Account/register','注册失败，请重新注册！');
                    endif;
                endif;
            else:
                $this->redirectError('Account/register','密码输入不一致！');
            endif;
        endif;
        $this->display();
    }

    // 方法:退出
    public function LoginOutAction()
    {
        $loginOut = arComp('list.session')->set('user',null);
        if(!$loginOut):
            $this->redirectSuccess('Account/login','已安全退出！');
        endif;
    }

}