<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PgKomponenGaji]].
 *
 * @see PgKomponenGaji
 */
class PgKomponenGajiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PgKomponenGaji[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PgKomponenGaji|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
