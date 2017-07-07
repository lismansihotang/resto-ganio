<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SatuanBahanBaku]].
 *
 * @see SatuanBahanBaku
 */
class SatuanBahanBakuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SatuanBahanBaku[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SatuanBahanBaku|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
