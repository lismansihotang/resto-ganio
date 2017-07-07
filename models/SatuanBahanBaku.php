<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satuan_bahan_baku".
 *
 * @property integer $id
 * @property string $nm_satuan
 */
class SatuanBahanBaku extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satuan_bahan_baku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_satuan'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_satuan' => 'Nama Satuan',
        ];
    }

    /**
     * @inheritdoc
     * @return SatuanBahanBakuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SatuanBahanBakuQuery(get_called_class());
    }
}
