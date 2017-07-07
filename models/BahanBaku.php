<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bahan_baku".
 *
 * @property integer $id
 * @property string $nm_bahan
 * @property string $harga
 */
class BahanBaku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bahan_baku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga'], 'number'],
            [['nm_bahan'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_bahan' => 'Nama Bahan',
            'harga' => 'Harga',
        ];
    }

    /**
     * @inheritdoc
     * @return BahanBakuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BahanBakuQuery(get_called_class());
    }
}
