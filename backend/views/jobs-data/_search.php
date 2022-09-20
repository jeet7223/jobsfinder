<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobsDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobs-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'job_title') ?>

    <?= $form->field($model, 'job_description') ?>

    <?= $form->field($model, 'job_location') ?>

    <?= $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'person_name') ?>

    <?php // echo $form->field($model, 'job_type') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'apply_link') ?>

    <?php // echo $form->field($model, 'about_the_company') ?>

    <?php // echo $form->field($model, 'job_url') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_featured') ?>

    <?php // echo $form->field($model, 'created_date') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
