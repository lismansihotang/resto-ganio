<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PgGaji]].
 *
 * @see PgGaji
 */
class PgGajiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PgGaji[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PgGaji|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
