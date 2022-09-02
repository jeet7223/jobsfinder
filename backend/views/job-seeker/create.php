<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JobSeeker */

$this->title = 'Create Job Seeker';
$this->params['breadcrumbs'][] = ['label' => 'Job Seekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-seeker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
