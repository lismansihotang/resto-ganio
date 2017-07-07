<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PettyCash;

/**
 * PettyCashSearch represents the model behind the search form about `app\models\PettyCash`.
 */
class PettyCashSearch extends PettyCash
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'insert_user', 'update_user'], 'integer'],
            [['tgl', 'keterangan', 'insert_date', 'update_date'], 'safe'],
            [['nominal'], 'number'],
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
        $query = PettyCash::find();

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
            'tgl' => $this->tgl,
            'nominal' => $this->nominal,
            'insert_date' => $this->insert_date,
            'insert_user' => $this->insert_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function searchWithDate($params)
    {
        $query = PettyCash::find();

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
            'tgl' => $this->tgl,
            'nominal' => $this->nominal,
            'insert_date' => $this->insert_date,
            'insert_user' => $this->insert_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        if (count($params) > 0) {
            $query->andFilterWhere(['between', 'tgl', $params['tgl_awal'], $params['tgl_akhir']]);
        }

        return $dataProvider;
    }
}
