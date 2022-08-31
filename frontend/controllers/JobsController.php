<?php

namespace frontend\controllers;

use common\models\JobsData;
use common\models\JobsDataSearch;
use Yii;

class JobsController extends \yii\web\Controller
{
    public function actionListings()
    {
        $searchModel = new JobsDataSearch();

        $jobsProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'jobsProvider'=> $jobsProvider,
            'searchModel'=> $searchModel
        ]);
    }
    public function actionDetails($id)
    {
        $job_details = JobsData::findOne($id);
        return $this->render('details',[
            'job_details'=>$job_details
        ]);
    }
    
  
}
