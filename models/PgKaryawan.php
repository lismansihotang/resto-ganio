<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pg_karyawan".
 *
 * @property integer $id
 * @property string $nm_karyawan
 */
class PgKaryawan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pg_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nm_karyawan'], 'required'],
            [['nm_karyawan'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nm_karyawan' => 'Nama Karyawan',
        ];
    }

    /**
     * @inheritdoc
     * @return PgKaryawanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PgKaryawanQuery(get_called_class());
    }
}
