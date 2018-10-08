<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form of `app\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'karyawan_id', 'long_visit_id', 'jam_pemesanan', 'visit_code', 'building_id', 'floor_id', 'room_id'], 'integer'],
            [['tujuan_pertemuan', 'tanggal_kedatangan', 'created'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Pemesanan::find();

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
        $query->groupBy('visit_code');
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'karyawan_id' => $this->karyawan_id,
            'tanggal_kedatangan' => $this->tanggal_kedatangan,
            'long_visit_id' => $this->long_visit_id,
            'jam_pemesanan' => $this->jam_pemesanan,
            'visit_code' => $this->visit_code,
            'tenant_id' => Yii::$app->user->identity->tenant_id,
            'building_id' => $this->building_id,
            'floor_id' => $this->floor_id,
            'room_id' => $this->room_id,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'tujuan_pertemuan', $this->tujuan_pertemuan]);

        return $dataProvider;
    }
}
