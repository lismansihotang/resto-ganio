<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BahanBakuStock]].
 *
 * @see BahanBakuStock
 */
class BahanBakuStockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BahanBakuStock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BahanBakuStock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
