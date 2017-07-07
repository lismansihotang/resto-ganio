<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penjualan;

/**
 * PenjualanSearch represents the model behind the search form about `app\models\Penjualan`.
 */
class PenjualanSearch extends Penjualan
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tgl', 'tipe_bayar', 'id_pelanggan', 'nm_pemesan', 'no_telp_pemesan'], 'safe'],
            [['subtotal', 'disc', 'pajak', 'total', 'pembayaran'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Penjualan::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'total' => SORT_ASC,
                        'id_pelanggan' => SORT_ASC,
                        'tgl' => SORT_DESC,
                    ]
                ]
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('pelanggan');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id' => $this->id,
                'tgl' => $this->tgl,
                'subtotal' => $this->subtotal,
                'disc' => $this->disc,
                'pajak' => $this->pajak,
                'total' => $this->total,
                'pembayaran' => $this->pembayaran,
                'nm_pemesan' => $this->nm_pemesan,
                'no_telp_pemesan' => $this->no_telp_pemesan
            ]
        );
        $query->filterWhere(['like', 'nm_pemesan', $this->nm_pemesan])->andFilterWhere(['like', 'no_telp_pemesan', $this->no_telp_pemesan])->andFilterWhere(['like', 'pelanggan.nm_pelanggan', $this->id_pelanggan])
            ->andFilterWhere(['between', 'tgl', date('Y-m-d'), date('Y-m-d')]);
        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function searchRevisiPembayaran($params)
    {
        $query = Penjualan::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'tgl' => SORT_DESC,
                        'total' => SORT_ASC,
                    ]
                ]
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        //$query->joinWith('pelanggan');
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id' => $this->id,
                'tgl' => $this->tgl,
                'subtotal' => $this->subtotal,
                'disc' => $this->disc,
                'pajak' => $this->pajak,
                'total' => $this->total,
                'pembayaran' => $this->pembayaran,
            ]
        );
        //$query->andFilterWhere(['like', 'pelanggan.nm_pelanggan', $this->id_pelanggan])->andFilterWhere(['like', 'tipe_bayar', $this->tipe_bayar]);
        $query->andFilterWhere(['like', 'tipe_bayar', $this->tipe_bayar]);
        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function searchWithDate($params)
    {
        $query = Penjualan::find();
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'tgl' => SORT_DESC,
                    ]
                ],
                'pagination' => false,
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id' => $this->id,
                'tgl' => $this->tgl,
                'id_pelanggan' => $this->id_pelanggan,
                'subtotal' => $this->subtotal,
                'disc' => $this->disc,
                'pajak' => $this->pajak,
                'total' => $this->total,
                'pembayaran' => $this->pembayaran,
            ]
        );
        if (count($params) > 0) {
            $query->andFilterWhere(['between', 'tgl', $params['tgl_awal'], $params['tgl_akhir']]);
        }

        return $dataProvider;
    }
}
