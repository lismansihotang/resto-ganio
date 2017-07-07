<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PgGajiDetail;

/**
 * PgGajiDetailSearch represents the model behind the search form about `app\models\PgGajiDetail`.
 */
class PgGajiDetailSearch extends PgGajiDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_gaji', 'id_karyawan', 'id_komponen', 'jml'], 'integer'],
            [['nominal', 'subtotal'], 'number'],
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
        $query = PgGajiDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_gaji' => $this->id_gaji,
            'id_karyawan' => $this->id_karyawan,
            'id_komponen' => $this->id_komponen,
            'nominal' => $this->nominal,
            'jml' => $this->jml,
            'subtotal' => $this->subtotal,
        ]);

        return $dataProvider;
    }
}
