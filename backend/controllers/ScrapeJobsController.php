<?php

namespace backend\controllers;

use common\models\ScrapeJobs;
use common\models\ScrapeJobsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScrapeJobsController implements the CRUD actions for ScrapeJobs model.
 */
class ScrapeJobsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ScrapeJobs models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ScrapeJobsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new ScrapeJobs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ScrapeJobs();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $model->job_type = implode(',',$model->job_type);
                $model->save();
                $command = "/usr/bin/python3 /var/www/html/jobsfinder/frontend/web/linkedin_job_scraper/scrape.py "
                    .$model->id.' > /dev/null &';
                exec($command);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
        public function actionTest(){

        $my_output = shell_exec("/usr/bin/python3 /var/www/html/jobsfinder/frontend/web/linkedin_job_scraper/scrape.py 1 2>&1");
        echo "<pre>";
        print_r($my_output);
        die();
    }





    /**
     * Finds the ScrapeJobs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ScrapeJobs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ScrapeJobs::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
