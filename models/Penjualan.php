<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property integer $id
 * @property string $tgl
 * @property integer $id_pelanggan
 * @property string $subtotal
 * @property string $disc
 * @property string $pajak
 * @property string $total
 * @property string $pembayaran
 * @property string $tipe_bayar
 * @property string $nm_pemesan
 * @property string $no_telp_pemesan
 */
class Penjualan extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl'], 'required'],
            [['tgl'], 'safe'],
            [['id_pelanggan'], 'integer'],
            [['subtotal', 'disc', 'pajak', 'total', 'pembayaran', 'nm_pemesan', 'no_telp_pemesan'], 'string'],
            [['tipe_bayar'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tgl. Pembelian',
            'id_pelanggan' => 'Pelanggan',
            'subtotal' => 'Subtotal',
            'disc' => 'Discount',
            'pajak' => 'Pajak',
            'total' => 'Total',
            'pembayaran' => 'Pembayaran',
            'tipe_bayar' => 'Tipe Bayar',
            'nm_pemesan' => 'Nama Pemesan',
            'no_telp_pemesan' => 'No. Telp Pemesan'
        ];
    }

    /**
     * @inheritdoc
     * @return PenjualanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenjualanQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['id' => 'id_pelanggan']);
    }

    /**
     * @param $provider
     * @param $fieldName
     * @return int
     */
    static function getTotal($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return number_format($total);
    }
}
