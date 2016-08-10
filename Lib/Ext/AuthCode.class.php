<?php 
/**
  * Class: 验证码类
  * Author: lx 
  */
class AuthCode
{
	protected $image;
	protected $str = '123456789';
	protected $code;
	protected $codestr;
	
	function __construct()
	{
		
	}

	// 创建画布
	private function createCanva()
	{
		$this->image = imagecreate(100, 30);
		$imagecolor = imagecolorallocate($this->image, rand(200,255), rand(200,255), rand(200,255));
	}

	// 生成干扰点
	private function createPoint()
	{
		for ($i=0; $i < 200; $i++) { 
			imagesetpixel($this->image, rand(0,100),rand(0,30), imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255)));
		}
	}

	// 生成干扰线
	private function createLine()
	{
		for ($i=0; $i < 4; $i++) { 
			imageline($this->image, rand(0,100), rand(0,30), rand(0,100), rand(0,30), imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255)));
		}
	}

	// 生成字符
	private function createCode()
	{
		for ($i=0; $i < 4 ; $i++) { 
			$fontcolor = imagecolorallocate($this->image, rand(0,200), rand(0,200), rand(0,200));
			$x = $i*25+7;
			$y = rand(5,10);
			$this->code = substr($this->str, rand(0,strlen($this->str)-1),1);
			imagestring($this->image, 6, $x, $y, $this->code, $fontcolor);
			$this->codestr.=$this->code;
		}
	}

	// 输出
	public function outPut()
	{
		ob_clean();
		header('content-type:image/png');
		imagepng($this->image);
		imagedestroy($this->image);
	}

	// 对外显示
	public function show()
	{
		$this->createCanva();
		$this->createPoint();
		$this->createLine();
		$this->createCode();
		$this->outPut();
	}

	// 获取验证码
	public function getCode()
	{
		return $this->codestr;
	}
}