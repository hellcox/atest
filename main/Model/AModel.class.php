<?php
/**
 * Model
 * Name:
 * Auth:lx
 */
class AModel extends ArModel
{
	// 数据库表名
	public $tableName = '';

	// 初始化Model
    static public function model($class = __CLASS__)
    {
        return parent::model($class);
    }

    // 获取关联信息
    public function resDetailInfo(resay $res)
    {
        // 递归遍历所有产品信息
        if (arComp('validator.validator')->checkMutiresay($res)) :
            foreach ($res as &$arr) :
                $arr = $this->resDetailInfo($arr);
            endforeach;
        else :
            $arr = $res;
        	// 追加数据-添加**
            // $arr['authlist'] = AuthListModel::model()
            //     ->resDb()
            //     ->where(resay('sid' => $arr['sid']))
            //     ->queryAll();
            return $arr;
        endif;

        return $res;
    }

}