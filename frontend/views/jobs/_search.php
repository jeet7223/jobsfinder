<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JobsDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['jobs/listings']),
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>





    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model,'keyword')->textInput(['placeholder'=>'Keyword, Skill, Title'])
                ->label
            (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'job_title')->textInput(['placeholder'=>'Job Title'])->label
            (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'job_location')->textInput(['placeholder'=>'Job Location'])->label
            (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'company_name')->textInput(['placeholder'=>'Company Name'])
                ->label
            (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'source')->dropDownList(['linkedin'=>'Linkedin','posted-job'=>'Posted Jobs'],
                ['prompt'=>'Select Source'])
                ->label
                (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'category')->dropDownList(['General'=>'General'],
                ['prompt'=>'Select Category'])
                ->label
                (false)?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model,'job_type')->dropDownList([null=>'Full Time'],
                ['prompt'=>'Select Job Type'])
                ->label
                (false)?>
        </div>


    </div>




    <div class="form-group ">
       <div class="mt-2">
           <?= Html::submitButton('Search', ['class' => 'btn head-btn1 w-100']) ?>
       </div>
        <div class="mt-2">
            <?= Html::a('Reset', \yii\helpers\Url::to(['jobs/listings']),['class' => 'btn head-btn2 w-100']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>