<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_gaji_detail".
 *
 * @property integer $id
 * @property integer $id_gaji
 * @property integer $id_karyawan
 * @property integer $id_komponen
 * @property string $nominal
 * @property integer $jml
 * @property string $subtotal
 */
class PgGajiDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_gaji_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gaji', 'id_karyawan', 'id_komponen', 'nominal', 'jml', 'subtotal'], 'required'],
            [['id_gaji', 'id_karyawan', 'id_komponen', 'jml'], 'integer'],
            [['nominal', 'subtotal'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gaji' => 'ID Penggajian',
            'id_karyawan' => 'Karyawan',
            'id_komponen' => 'Komponen',
            'nominal' => 'Nominal',
            'jml' => 'Jumlah',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @inheritdoc
     * @return PgGajiDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgGajiDetailQuery(get_called_class());
    }
}
