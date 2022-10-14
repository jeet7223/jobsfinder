<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">


    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle " data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">


            <ul class="nav navbar-nav header-admin">


                <li class="nav-item">
                   <a href="#" class="header-link"> <i class="fa fa-user"></i>   <?= Yii::$app->user->identity->username ?></a>
                </li>
                <li class="nav-item">
                <?= Html::a(
                                    '<i class="fa fa-globe"></i> Go to Site',
                                    Yii::$app->request->hostInfo,
                                    ['class' => 'header-link','target'=>'_blank']
                                ) ?>
                </li>

            </ul>
        </div>
    </nav>
</header>
