<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/* @var $post_a_job \common\models\JobsData*/

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
$this->title='Post A Job';

?>

    <div class="shadow-div" id="form-container">

        <h2><strong><span style="color: #fb246a">Post</span> A Job</strong></h2>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-post']); ?>
                <h4><b>Job Details</b></h4>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($post_a_job, 'job_title')->textInput(['autofocus' => true,'placeholder' => '']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($post_a_job, 'job_location')->textInput(['autofocus' => true,'placeholder' => '']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($post_a_job, 'job_type')->dropdownList([0=>'Full Time',1=>'Part Time',2=>'Internship',3=>'Remote Work']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($post_a_job, 'job_description')->textarea() ?>
                    </div>
                </div>
                <h4><b>Company Details</b></h4>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($post_a_job, 'company_name')->textInput(['autofocus' => true,'placeholder' => '']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?= $form->field($post_a_job, 'about_the_company')->textarea() ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn head-btn2', 'name' => 'post-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php
$script = <<< JS
JS;
$this->registerJs($script);
?>