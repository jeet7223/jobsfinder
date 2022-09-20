<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login">
    <div class="shadow-div" id="form-container">
        <h2><strong><span style="color: #fb246a">Login</span></strong></h2>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>



                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn head-btn2', 'name' => 'login-button']) ?>
                </div>


            <?php ActiveForm::end(); ?>
            <br>
            <?= \yii\helpers\Html::a('Forgot Password ?',\yii\helpers\Url::to
            (['site/request-password-reset']),["class"=>'forgot-password'])?>
        </div>
    </div>
</div>
</div>