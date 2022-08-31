<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */
/** @var \common\models\Employer $employer */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup - Employer';
?>
<div class="site-signup">


    <div class="shadow-div" id="form-container">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item bg-light">
                <a class="nav-link " href="<?= Url::to(['site/signup','user_type'=>'seeker'])
                ?>">Job
                    Seeker</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link"  href="<?= Url::to(['site/signup','user_type'=>'employer'])
                ?>">Employer</a>
            </li>

        </ul>

        <br>
        <br>
        <h2><strong><span style="color: #fb246a">Register</span> Employer</strong></h2>
        <p>Please fill out the following fields to signup:</p>
        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <h4><b>Personal Details</b></h4>

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'first_name')->textInput(['autofocus' => true,'placeholder' => 'Enter First Name']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'last_name')->textInput(['autofocus' => true,'placeholder' => 'Enter Last Name']) ?>
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
                        <?= $form->field($employer, 'contact_number')->textInput(['autofocus' => true,'placeholder' => '0001-1101-11']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'gender')->dropdownList([0=>'Male',1=>'Female',2=>'Other'])?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'dob')->textInput()?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($employer, 'city')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($employer, 'state')->textInput()?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($employer, 'country')->textInput()?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'address')->textarea(['placeholder' => 'Address'])?>
                    </div>
                </div>
                <br>
                <h4><b>Employement Details</b></h4>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'current_company_name')->textInput()?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'employment_type')->dropdownList([0=>"Not Employed", 1=>'Self Employed', 2=> 'Student', 3 => 'Internship', 4 => 'Employed'])?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($employer, 'profile_image')->textInput()?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn head-btn2', 'name' => 'signup-button']) ?>
                </div>




                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
