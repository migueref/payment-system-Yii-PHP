<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tuition;

/**
 * TuitionSearch represents the model behind the search form about `backend\models\Tuition`.
 */
class TuitionSearch extends Tuition
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCourse', 'status'], 'integer'],
            [['total'], 'number'],
            [['tuition_status', 'month', 'created_at', 'updated_at'], 'safe'],
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
        $query = Tuition::find();

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
            'idCourse' => $this->idCourse,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tuition_status', $this->tuition_status])
            ->andFilterWhere(['like', 'month', $this->month]);

        return $dataProvider;
    }
}
