<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_komponen_gaji".
 *
 * @property integer $id
 * @property string $deskripsi
 * @property string $tipe
 */
class PgKomponenGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_komponen_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deskripsi'], 'required'],
            [['tipe'], 'string'],
            [['deskripsi'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deskripsi' => 'Deskripsi',
            'tipe' => 'Tipe Komponen',
        ];
    }

    /**
     * @inheritdoc
     * @return PgKomponenGajiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgKomponenGajiQuery(get_called_class());
    }
}
