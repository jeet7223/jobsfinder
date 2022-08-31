<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JobsData;

/**
 * JobsDataSearch represents the model behind the search form of `common\models\JobsData`.
 */
class JobsDataSearch extends JobsData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'job_type', 'status', 'is_featured'], 'integer'],
            [['job_title', 'job_description', 'job_location', 'company_name', 'person_name', 'category', 'apply_link', 'about_the_company', 'job_url', 'created_date'], 'safe'],
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
        $query = JobsData::find();

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
            'job_type' => $this->job_type,
            'status' => $this->status,
            'is_featured' => $this->is_featured,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'job_title', $this->job_title])
            ->andFilterWhere(['like', 'job_description', $this->job_description])
            ->andFilterWhere(['like', 'job_location', $this->job_location])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'person_name', $this->person_name])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'apply_link', $this->apply_link])
            ->andFilterWhere(['like', 'about_the_company', $this->about_the_company])
            ->andFilterWhere(['like', 'job_url', $this->job_url]);

        return $dataProvider;
    }
}
