<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bahan_baku_stock".
 *
 * @property integer $id
 * @property integer $id_bahan_baku
 * @property string $tgl
 * @property integer $stock
 * @property string $jenis
 */
class BahanBakuStock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bahan_baku_stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bahan_baku', 'tgl', 'stock'], 'required'],
            [['id_bahan_baku', 'stock'], 'integer'],
            [['tgl'], 'safe'],
            [['jenis'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bahan_baku' => 'Bahan Makanan',
            'tgl' => 'Tgl',
            'stock' => 'Stock',
            'jenis' => 'Jenis',
        ];
    }

    /**
     * @inheritdoc
     * @return BahanBakuStockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BahanBakuStockQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahanBaku()
    {
        return $this->hasOne(BahanBaku::className(), ['id' => 'id_bahan_baku']);
    }
}
