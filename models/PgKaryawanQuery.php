<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PgKaryawan]].
 *
 * @see PgKaryawan
 */
class PgKaryawanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PgKaryawan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PgKaryawan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
