<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_gaji".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $tgl_awal
 * @property string $tgl_akhir
 * @property string $nominal
 * @property string $keterangan
 */
class PgGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'tgl_awal', 'tgl_akhir'], 'required'],
            [['tgl', 'tgl_awal', 'tgl_akhir'], 'safe'],
            [['nominal'], 'number'],
            [['keterangan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl. Penggajian',
            'tgl_awal' => 'Tgl. Awal Cut Off',
            'tgl_akhir' => 'Tgl. Akhir Cut Off',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @inheritdoc
     * @return PgGajiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgGajiQuery(get_called_class());
    }
}
