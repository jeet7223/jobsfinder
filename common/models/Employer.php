<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employer".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $contact_number
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $current_company_name
 * @property int $employment_type
 * @property int $gender
 * @property string $dob
 * @property string|null $profile_image
 */
class Employer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'employment_type', 'gender', 'dob'], 'required'],
            [['user_id', 'employment_type', 'gender'], 'integer'],
            [['address'], 'string'],
            [['first_name', 'last_name', 'contact_number', 'current_company_name', 'profile_image'], 'string', 'max' => 100],
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
            'current_company_name' => 'Current Company Name',
            'employment_type' => 'Employment Type',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'profile_image' => 'Profile Image',
        ];
    }
}
