<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job_seeker".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $contact_number
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property int $gender
 * @property string $dob
 * @property string|null $institution_name
 * @property string|null $course_name
 * @property int|null $from_year
 * @property int|null $to_year
 * @property int|null $total_experience
 * @property string|null $skills
 * @property string $professional_title
 * @property string|null $about_your_self
 * @property int $employment_status
 * @property string|null $about_employment
 */
class JobSeeker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_seeker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'dob', 'professional_title', 'employment_status'], 'required'],
            [['user_id', 'gender', 'from_year', 'to_year', 'total_experience', 'employment_status'], 'integer'],
            [['address', 'about_your_self', 'about_employment'], 'string'],
            [['first_name', 'last_name', 'contact_number', 'institution_name', 'course_name', 'skills', 'professional_title'], 'string', 'max' => 100],
            [['city', 'state', 'country', 'dob'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'contact_number' => 'Contact Number',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'institution_name' => 'Institution Name',
            'course_name' => 'Course Name',
            'from_year' => 'From Year',
            'to_year' => 'To Year',
            'total_experience' => 'Total Experience',
            'skills' => 'Skills',
            'professional_title' => 'Professional Title',
            'about_your_self' => 'About Your Self',
            'employment_status' => 'Employment Status',
            'about_employment' => 'About Employment',
        ];
    }
}
