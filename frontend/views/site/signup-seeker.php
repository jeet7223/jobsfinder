<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */
/** @var \common\models\JobSeeker $seeker */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup - Job Seeker';
?>
<div class="site-signup">


    <div class="shadow-div" id="form-container">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item active">
                <a class="nav-link " href="<?= Url::to(['site/signup','user_type'=>'seeker'])
                ?>">Job
                    Seeker</a>
            </li>
            <li class="nav-item bg-light">
                <a class="nav-link"  href="<?= Url::to(['site/signup','user_type'=>'employer'])
                ?>">Employer</a>
            </li>

        </ul>

    <br>
        <br>
            <h2><strong><span style="color: #28a745">Register</span> Job Seeker</strong></h2>
        <p>Please fill out the following fields to signup:</p>
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <h4><b>Personal Details</b></h4>

            <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'first_name')->textInput(['autofocus' => true,'placeholder' => 'Enter First Name']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'last_name')->textInput(['autofocus' => true,'placeholder' => 'Enter Last Name']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => 'Enter Username']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'eg. abc@gmail.com']) ?>
                    </div>
                </div>
                <div class="row">                
                    <div class="col-lg-6">
                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Must have at least 8 character']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'contact_number')->textInput(['autofocus' => true,'placeholder' => '0001-1101-11']) ?>
                    </div>
                </div>                
                <div class="row">                                    
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'gender')->dropdownList([0=>'Male',1=>'Female',2=>'Other'])?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'dob')->textInput()?>
                    </div>
                </div>                   
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'city')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'state')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'country')->textInput()?>
                    </div>
                </div>     
                <div class="row">
                <div class="col-lg-6">
                        <?= $form->field($seeker, 'address')->textarea(['placeholder' => 'Address'])?>
                    </div>
                </div>
                <br>
            <h4><b>Educational Details</b></h4>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'institution_name')->textInput()?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'course_name')->textInput()?>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'from_year')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'to_year')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($seeker, 'total_experience')->textInput()?>
                    </div>
                </div>
                <br>
            <h4><b>Employement Details</b></h4>
                <div class="row">
                <div class="col-lg-6">
                        <?= $form->field($seeker, 'employment_status')->dropdownList([0=>"Not Employed", 1=>'Self Employed', 2=> 'Student', 3 => 'Internship', 4 => 'Employed'])?>
                    </div>
                </div>
                <div class="row" id="emp-detail" style="display: none;">
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'skills')->textInput()?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'professional_title')->textInput()?>
                    </div>                    
                </div>                 
                <div class="row" id="about-emp" style="display: none;">
                    <div class="col-lg-6">
                        <?= $form->field($seeker, 'about_employment')->textarea()?>
                    </div>                                 
                </div>  
                <br>   
            <h4><b>Describe Your Self</b></h4>
                <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($seeker, 'about_your_self')->textarea()?>                       
                    </div>       
                </div>         
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>
                

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$script = <<< JS
   $('#jobseeker-employment_status').change(function(){
    // alert($(this).val());
    if($(this).val() == 1 || $(this).val() == 4){
        $('#emp-detail').show();
        $('#about-emp').show();
    }     
    else{
        $('#emp-detail').hide();
        $('#about-emp').hide();
    }
   });
JS;
$this->registerJs($script);
?>