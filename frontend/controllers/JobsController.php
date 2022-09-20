<?php

namespace frontend\controllers;

use common\models\Employer;
use common\models\JobsData;
use common\models\JobsDataSearch;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class JobsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['post-a-job'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['listings','details'],
                        'allow' => true,
                    ],

                ],
            ],

        ];
    }
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

    public function actionPostAJob()
    {
        $post_a_job = new JobsData();
        if($post_a_job->load(Yii::$app->request->post()) && $post_a_job->validate() && $post_a_job->load(Yii::$app->request->post())){
            $post_a_job->source = 'posted-job';
            $post_a_job->category = 'General';
            $user  = User::findOne(Yii::$app->user->identity->id);
            $employer = Employer::findOne(['user_id'=>$user->id]);
            $post_a_job->person_name = $employer->first_name." ".$employer->last_name;
            $post_a_job->save(false);
            Yii::$app->session->setFlash('success','Job Posted Successfully');
            return $this->redirect(['site/index']);
        }
        return $this->render('post-a-job',[
            'post_a_job'=>$post_a_job
        ]);
    }


}
