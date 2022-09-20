<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ScrapeJobsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrape-jobs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'job_type') ?>

    <?= $form->field($model, 'source') ?>



    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'scrape_limit') ?>

    <?php // echo $form->field($model, 'requested_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
