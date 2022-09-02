<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobSeeker */

$this->title = 'Update Job Seeker: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Job Seekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-seeker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
