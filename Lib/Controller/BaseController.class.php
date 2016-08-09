<?php
/**
 * Controller
 * Author:lx
 * Name:Base
 */
class BaseController extends ArController
{
	// 方法:初始化
    public function init()
    {	
    	$isLoginIn = arModule('Lib.Auth')->isLoginIn();
        if(!$isLoginIn):
        	$this->redirectError('Account/login','请登录');
        else:
        endif;
    }

}