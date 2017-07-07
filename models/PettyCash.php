<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "petty_cash".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $nominal
 * @property string $keterangan
 * @property string $insert_date
 * @property integer $insert_user
 * @property string $update_date
 * @property integer $update_user
 */
class PettyCash extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'petty_cash';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'insert_date', 'update_date'], 'safe'],
            [['nominal'], 'number'],
            [['keterangan'], 'string'],
            [['insert_user', 'update_user'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl.',
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
            'insert_date' => 'Tgl. Insert',
            'insert_user' => 'User Insert',
            'update_date' => 'Tgl. Update',
            'update_user' => 'User Update',
        ];
    }

    /**
     * @inheritdoc
     * @return PettyCashQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PettyCashQuery(get_called_class());
    }
}
