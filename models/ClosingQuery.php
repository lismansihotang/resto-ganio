<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Closing]].
 *
 * @see Closing
 */
class ClosingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Closing[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Closing|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
