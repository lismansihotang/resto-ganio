<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_karyawan_komponen".
 *
 * @property integer $id
 * @property integer $id_karyawan
 * @property integer $id_komponen
 * @property string $nominal
 */
class PgKaryawanKomponen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_karyawan_komponen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'id_komponen', 'nominal'], 'required'],
            [['id_karyawan', 'id_komponen'], 'integer'],
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
            'id_karyawan' => 'Karyawan',
            'id_komponen' => 'Komponen Gaji',
            'nominal' => 'Nominal',
        ];
    }

    /**
     * @inheritdoc
     * @return PgKaryawanKomponenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgKaryawanKomponenQuery(get_called_class());
    }
}
