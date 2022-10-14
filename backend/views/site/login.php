<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Administrator Login | JobsFinder';
?>
<div class="site-login">


    <div class="container responsive-container" id="form-container">
        <div class="row">
            <div class="col-lg-12">


                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <h2><strong><span style="color: #fb246a">Admin</span> Login</strong></h2>
                <p>Please fill out the following fields to login:</p>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>