<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BahanBaku]].
 *
 * @see BahanBaku
 */
class BahanBakuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BahanBaku[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BahanBaku|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
