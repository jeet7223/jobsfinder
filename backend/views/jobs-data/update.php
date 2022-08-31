<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobsData */

$this->title = 'Update Jobs Data: ' . $model->job_title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jobs-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
