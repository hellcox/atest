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

    // 获取关联详细信息 万能方法
    public function getDetailInfo(array $res)
    {
        // 递归遍历所有产品信息
        if (arComp('validator.validator')->checkMutiArray($res)) :
            foreach ($res as &$arr) :
                $arr = $this->getDetailInfo($arr);
            endforeach;
        else :
            $arr = $res;
        	// 追加数据-添加**
            // $arr['authlist'] = AuthListModel::model()
            //     ->getDb()
            //     ->where(array('sid' => $arr['sid']))
            //     ->queryAll();

            return $arr;
        endif;

        return $res;
    }
}