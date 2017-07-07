<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resep;

/**
 * ResepSearch represents the model behind the search form about `app\models\Resep`.
 */
class ResepSearch extends Resep
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qty'], 'integer'],
            [['id_makanan', 'id_bahan_baku', 'id_satuan'], 'safe'],
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
        $query = Resep::find();

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

        $query->joinWith('makanan');
        $query->joinWith('bahanBaku');
        $query->joinWith('satuan');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'qty' => $this->qty,
        ]);

        $query->andFilterWhere(['like', 'barang.nm_barang', $this->id_makanan])
            ->andFilterWhere(['like', 'bahan_baku.nm_bahan', $this->id_bahan_baku])
            ->andFilterWhere(['like', 'satuan_bahan_baku.nm_satuan', $this->id_satuan]);
        return $dataProvider;
    }
}
