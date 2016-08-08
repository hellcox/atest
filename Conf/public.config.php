<?php
/**
 * Ar default public config file.
 *
 * @author ycassnr <ycassnr@gmail.com>
 */
return array(
    'moduleLists' => array(
        'main'
    ),
	// 关闭 trace 显示
    'DEBUG_SHOW_TRACE' => false,
    // 'DEBUG_LOG' => true,

    // 模板后缀
    'TPL_SUFFIX' => 'html',

    // 组件配置开始
    'components' => array(
        // 懒惰加载
        'lazy' => true,
        'db' => array(
            // 懒惰加载
            'lazy' => true,
            // mysql数据库组件
            'mysql' => array(
                'config' => array(
                    // 读库
                    'read' => array(
                        // 默认读库配置
                        'default' => array(
                            //'dsn' => 'mysql:host=192.168.0.129;dbname=zaojiao;port=3306',
                            // 'dsn' => 'mysql:host=211.149.195.135;dbname=zaojiao;port=9906',
                            'dsn' => 'mysql:host=127.0.0.1;dbname=atest;port=3306',
                            'user' => 'root',
                            'pass' => '123456',
                            'prefix' => '',
                            'option' => array(
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
                            ),
                        ),

                    ),

                ),
            ),
        ),
        // mysql 配置结束
    ),
);