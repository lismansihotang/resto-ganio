<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "closing".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $nominal
 * @property string $ket
 * @property string $insert_date
 * @property string $update_date
 */
class Closing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'closing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['nominal'], 'number'],
            [['ket'], 'string'],
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
            'ket' => 'Keterangan',
            'insert_date' => 'Insert Date',
            'update_date' => 'Update Date',
        ];
    }

    /**
     * @inheritdoc
     * @return ClosingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClosingQuery(get_called_class());
    }
}
