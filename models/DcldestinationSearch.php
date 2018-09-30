<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dcldestination;

/**
 * DcldestinationSearch represents the model behind the search form of `app\models\Dcldestination`.
 */
class DcldestinationSearch extends Dcldestination
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'floor_id', 'phone'], 'integer'],
            [['company_name', 'open_hour', 'close_hour', 'build_id', 'email', 'profile', 'picture', 'address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Dcldestination::find();

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
            'open_hour' => $this->open_hour,
            'close_hour' => $this->close_hour,
            'floor_id' => $this->floor_id,
            'phone' => $this->phone,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'build_id', $this->build_id])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'profile', $this->profile])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
