<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScrapeJobs */

$this->title = "Scrape Jobs ID -:". $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scrape Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scrape-jobs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
