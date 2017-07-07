<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PgKaryawanKomponen]].
 *
 * @see PgKaryawanKomponen
 */
class PgKaryawanKomponenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PgKaryawanKomponen[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PgKaryawanKomponen|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
