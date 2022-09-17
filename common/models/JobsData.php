<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jobs_data".
 *
 * @property int $id
* @property int $user_id
 * @property string|null $job_title
 * @property string|null $job_description
 * @property string|null $job_location
 * @property string|null $company_name
 * @property string|null $person_name
 * @property int|null $job_type
 * @property int|null $category
 * @property string|null $apply_link
 * @property string|null $about_the_company
 * @property string|null $job_url
 * @property int|null $status
 * @property int|null $is_featured
 * @property string|null $source
 * @property string $created_date
 */
class JobsData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jobs_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_description', 'about_the_company'], 'string'],
            [['job_type', 'status', 'is_featured','user_id'], 'integer'],
            [['created_date','apply_link', 'job_url'], 'safe'],
            [['job_title', 'job_location', 'company_name', 'person_name', 'source','category'], 'string', 'max' => 100],
            // name, email, subject and body are required
            [['job_title', 'job_location', 'job_type', 'job_description', 'company_name', 'about_the_company'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_title' => 'Job Title',
            'job_description' => 'Job Description',
            'job_location' => 'Job Location',
            'company_name' => 'Company Name',
            'person_name' => 'Person Name',
            'job_type' => 'Job Type',
            'category' => 'Category',
            'apply_link' => 'Apply Link',
            'about_the_company' => 'About The Company',
            'job_url' => 'Job Url',
            'status' => 'Status',
            'is_featured' => 'Is Featured',
            'source' => 'Source',
            'created_date' => 'Created Date',
        ];
    }
}
