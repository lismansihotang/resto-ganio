<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kas".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $nominal
 * @property string $insert_date
 * @property string $update_date
 */
class Kas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl'], 'required'],
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['nominal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl',
            'nominal' => 'Nominal',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @inheritdoc
     * @return KasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KasQuery(get_called_class());
    }
}
