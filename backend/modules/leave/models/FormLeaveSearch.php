<?php

namespace backend\modules\leave\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\leave\models\FormLeave;

/**
 * FormLeaveSearch represents the model behind the search form of `backend\modules\leave\models\FormLeave`.
 */
class FormLeaveSearch extends FormLeave
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'leave_type_id', 'start_part', 'end_part', 'acting_user_id', 'status', 'commander_status', 'commander_by', 'commander_at', 'inspector_status', 'inspector_by', 'inspector_at', 'director_status', 'director_by', 'director_at', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['year', 'to', 'contact', 'date_start', 'date_end', 'reason', 'commander_comment', 'inspector_comment', 'director_comment'], 'safe'],
            [['number_day'], 'number'],
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
        $query = FormLeave::find();

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
            'year' => $this->year,
            'user_id' => $this->user_id,
            'leave_type_id' => $this->leave_type_id,
            'date_start' => $this->date_start,
            'start_part' => $this->start_part,
            'date_end' => $this->date_end,
            'end_part' => $this->end_part,
            'number_day' => $this->number_day,
            'acting_user_id' => $this->acting_user_id,
            'status' => $this->status,
            'commander_status' => $this->commander_status,
            'commander_by' => $this->commander_by,
            'commander_at' => $this->commander_at,
            'inspector_status' => $this->inspector_status,
            'inspector_by' => $this->inspector_by,
            'inspector_at' => $this->inspector_at,
            'director_status' => $this->director_status,
            'director_by' => $this->director_by,
            'director_at' => $this->director_at,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'to', $this->to])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'commander_comment', $this->commander_comment])
            ->andFilterWhere(['like', 'inspector_comment', $this->inspector_comment])
            ->andFilterWhere(['like', 'director_comment', $this->director_comment]);

        return $dataProvider;
    }
}
