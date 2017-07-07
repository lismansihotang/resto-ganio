<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resep".
 *
 * @property integer $id
 * @property integer $id_makanan
 * @property integer $id_bahan_baku
 * @property integer $qty
 * @property integer $id_satuan
 */
class Resep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_makanan', 'id_bahan_baku', 'qty', 'id_satuan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_makanan' => 'ID Makanan',
            'id_bahan_baku' => 'ID Bahan Baku',
            'qty' => 'Qty',
            'id_satuan' => 'ID Satuan',
        ];
    }

    /**
     * @inheritdoc
     * @return ResepQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResepQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMakanan()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_makanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahanBaku()
    {
        return $this->hasOne(BahanBaku::className(), ['id' => 'id_bahan_baku']);
    }

    public function getSatuan(){
        return $this->hasOne(SatuanBahanBaku::className(), ['id' => 'id_satuan']);
    }
}
