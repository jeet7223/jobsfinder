<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "scrape_jobs".
 *
 * @property int $id
 * @property string $location
 * @property string $job_type
 * @property string $source
 * @property string $keyword
 * @property int $status
 * @property int $scrape_limit
 * @property string $requested_date
 */
class ScrapeJobs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scrape_jobs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'job_type', 'source', 'scrape_limit'], 'required'],
            [['status', 'scrape_limit'], 'integer'],
            [['requested_date','job_type'], 'safe'],
            [['location', 'keyword'], 'string', 'max' => 100],
            [['source'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location' => 'Location',
            'job_type' => 'Job Type',
            'source' => 'Source',
            'file_path' => 'File Path',
            'status' => 'Status',
            'scrape_limit' => 'Scrape Limit',
            'requested_date' => 'Requested Date',
        ];
    }
    public static function getStatus($status){
        if($status == 0){
            return '<span class="status-text" style="color:orange;">Pending</span>';
        }
        elseif ($status == 1) {
            return '<span class="status-text" style="color:blue;">Running</span>';
        }
        elseif ($status == 2) {
            return '<span class="status-text" style="color:green;">Completed</span>';
        }
        elseif ($status == 3) {
            return '<span class="status-text" style="color:red;">Failed</span>';
        }
        elseif ($status == 4){
            return '<span class="status-text" style="color:red;">No Result Found</span>';
        }
        else{
            return "Not reached";
        }
    }
    public static function getJobType($index){
        $array = [0=>'Full-time',1=>'Part-time',2=>'Contract',3=>'Temporary',4=>'Volunteer',5=>'Internship',6=>'Other'];
        return $array[$index];
    }
}
