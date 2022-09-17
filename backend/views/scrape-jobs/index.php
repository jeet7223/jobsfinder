<?php

use common\models\ScrapeJobs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ScrapeJobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scrape Jobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scrape-jobs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Scrape Jobs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'location',
            [

                'attribute'=>'job_type',
                'format'=>'raw',
                'value'=>function($model){
                    $data = "<ul>";
                    foreach(explode(',',$model->job_type) as $jt){
                        $data = $data."<li>".$model->getJobType($jt)."</li>";
                    }
                    if (!empty($model->job_type)){
                        return $data."</ul>";
                    }
                    else{
                        return "";
                    }
                }
            ],
            'source',
            'file_path',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>function($model){
                    return \common\models\ScrapeJobs::getStatus($model->status);
                }
            ],
            'scrape_limit',
            'requested_date:date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ScrapeJobs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
