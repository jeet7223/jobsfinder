<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JobSeeker;

/**
 * JobSeekerSearch represents the model behind the search form of `common\models\JobSeeker`.
 */
class JobSeekerSearch extends JobSeeker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'gender', 'from_year', 'to_year', 'total_experience', 'employment_status'], 'integer'],
            [['first_name', 'last_name', 'contact_number', 'address', 'city', 'state', 'country', 'dob', 'institution_name', 'course_name', 'skills', 'professional_title', 'about_your_self', 'about_employment'], 'safe'],
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
        $query = JobSeeker::find();

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
            'user_id' => $this->user_id,
            'gender' => $this->gender,
            'from_year' => $this->from_year,
            'to_year' => $this->to_year,
            'total_experience' => $this->total_experience,
            'employment_status' => $this->employment_status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'institution_name', $this->institution_name])
            ->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'skills', $this->skills])
            ->andFilterWhere(['like', 'professional_title', $this->professional_title])
            ->andFilterWhere(['like', 'about_your_self', $this->about_your_self])
            ->andFilterWhere(['like', 'about_employment', $this->about_employment]);

        return $dataProvider;
    }
}
