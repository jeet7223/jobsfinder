<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JobsData */

$this->title = $model->job_title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jobs-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'job_title',
            'job_description:ntext',
            'job_location',
            'company_name',
            'person_name',
            [
                'attribute'=>'job_type',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->job_type == 0){
                        return "Full Time";
                    }
                    elseif ($model->job_type == 1){
                        return "Part Time";
                    }
                    elseif ($model->job_type == 2){
                        return "Internship";
                    }
                    elseif ($model->job_type == 3){
                        return "Remote Work";
                    }
                }
            ],
            'category',
            'apply_link',
            'about_the_company:ntext',
            'job_url:url',
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
            ]
            ,
            'created_date:date',
        ],
    ]) ?>

</div>
