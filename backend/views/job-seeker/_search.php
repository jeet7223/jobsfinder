<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobSeekerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-seeker-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'institution_name') ?>

    <?php // echo $form->field($model, 'course_name') ?>

    <?php // echo $form->field($model, 'from_year') ?>

    <?php // echo $form->field($model, 'to_year') ?>

    <?php // echo $form->field($model, 'total_experience') ?>

    <?php // echo $form->field($model, 'skills') ?>

    <?php // echo $form->field($model, 'professional_title') ?>

    <?php // echo $form->field($model, 'about_your_self') ?>

    <?php // echo $form->field($model, 'employment_status') ?>

    <?php // echo $form->field($model, 'about_employment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
