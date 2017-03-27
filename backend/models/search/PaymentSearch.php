<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about `backend\models\Payment`.
 */
class PaymentSearch extends Payment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idTuition', 'idUser', 'created_at', 'updated_at', 'status'], 'integer'],
            [['tuition_number', 'type', 'voucher_number', 'payment_method', 'comment'], 'safe'],
            [['subtotal', 'discount', 'extra_charges', 'total'], 'number'],
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
        $query = Payment::find();

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
            'idTuition' => $this->idTuition,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'extra_charges' => $this->extra_charges,
            'total' => $this->total,
            'idUser' => $this->idUser,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tuition_number', $this->tuition_number])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'voucher_number', $this->voucher_number])
            ->andFilterWhere(['like', 'payment_method', $this->payment_method])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
