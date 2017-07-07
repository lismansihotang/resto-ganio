<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_absensi".
 *
 * @property integer $id
 * @property integer $id_karyawan
 * @property string $tgl
 * @property string $jam
 */
class PgAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_karyawan', 'tgl'], 'required'],
            [['id_karyawan'], 'integer'],
            [['tgl', 'jam'], 'safe'],
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
            'tgl' => 'Tgl',
            'jam' => 'Jam',
        ];
    }

    /**
     * @inheritdoc
     * @return PgAbsensiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgAbsensiQuery(get_called_class());
    }
}
