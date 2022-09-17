<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ScrapeJobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scrape-jobs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_type[]')->checkboxList([0=>'Full-time',1=>'Part-time',2=>'Contract',3=>'Temporary',4=>'Volunteer',5=>'Internship',6=>'Other']) ?>

    <?= $form->field($model, 'source')->dropDownList(['naukri'=>'naukri.com'],['prompt'=>'Select Source Website']) ?>

    <?= $form->field($model, 'file_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scrape_limit')->textInput(['placeholder'=>'Number of jobs want to Scrape']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
