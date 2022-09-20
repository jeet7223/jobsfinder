<?php

/** @var yii\web\View $this */

use common\models\JobsDataSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'JobsFinder | Home';
?>
<div class="site-index">
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                 style="background-image: url('<?= Yii::getAlias('@web/img/hero/h1_hero.jpg')?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find the most exciting startup jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <?php $form = ActiveForm::begin([
                                'action' => \yii\helpers\Url::to(['jobs/listings']),
                                'method' => 'get',
                                'options' => [
                                    'data-pjax' => 1
                                ],

                            ]);
                            $model  = new JobsDataSearch();
                            ?>
                            <div class="d-lg-flex" id="banner-form">
                            <div class="input-form">
                                <?= $form->field($model,'keyword')->textInput(['placeholder'=>'Keyword, Skill, Title'])
                                    ->label
                                    (false)?>
                                </div>
                            <div class="input-form">
                                <?= $form->field($model,'job_location')->textInput(['placeholder'=>'Job Location'])->label
                                (false)?>
                            </div>
                                <div class="search-form">
                                    <?= Html::submitButton('Search', ['class' => 'btn head-btn1 w-100']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
