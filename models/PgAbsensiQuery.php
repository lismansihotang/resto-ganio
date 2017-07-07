<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PgAbsensi]].
 *
 * @see PgAbsensi
 */
class PgAbsensiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PgAbsensi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PgAbsensi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
