<?php

namespace common\modules\lesson\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\lesson\models\Task;

/**
 * TaskSearch represents the model behind the search form of `common\modules\lesson\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'src', 'description', 'summary'], 'safe'],
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
        $query = Task::find();

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
            'is_publish' => $this->is_publish,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'src', $this->src])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'summary', $this->summary]);

        return $dataProvider;
    }
}
