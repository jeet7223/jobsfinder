<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ScrapeJobs */

$this->title = "Scrape Jobs ID -:". $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scrape Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="scrape-jobs-view">

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
            'id',
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
        ],
    ]) ?>

</div>
