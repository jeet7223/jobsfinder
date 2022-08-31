<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\JobsData;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\JobsDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jobs Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'job_title',
            // 'job_description:ntext',
            'job_location',
            'company_name',
            'person_name',
            //'job_type',
            'category',
            // 'apply_link',
            //'about_the_company:ntext',
            // 'job_url:url',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->status == 1){
                        return "<span class='text text-success'>Active</span>";
                    }
                    else{
                        return "<span class='text text-danger'>Inactive</span>";
                    }
                }
            ],
            [
                'attribute'=>'is_featured',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->is_featured == 1){
                        return "<span class='badge badge-success'>Featured</span>";
                    }
                    else{
                        return "<span class='badge badge-danger'>Not Featured</span>";
                    }
                }
            ],
            'created_date:date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JobsData $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
