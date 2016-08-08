<?php
/**
 * Model
 * Name:用户表
 * Auth:lx
 */
class UserModel extends ArModel
{
	// 数据库表名
	public $tableName = 's_user';

	// 初始化Model
    static public function model($class = __CLASS__)
    {
        return parent::model($class);

    }

    // 获取关联详细信息 万能方法
    public function getDetailInfo(array $bundles)
    {
        // 递归遍历所有产品信息
        if (arComp('validator.validator')->checkMutiArray($bundles)) :
            foreach ($bundles as &$bundle) :
                $bundle = $this->getDetailInfo($bundle);
            endforeach;
        else :
            $bundle = $bundles;
        	// 追加数据-添加**
            // $bundle['authlist'] = AuthListModel::model()
            //     ->getDb()
            //     ->where(array('sid' => $bundle['sid']))
            //     ->queryAll();

            return $bundle;
        endif;

        return $bundles;
    }
}