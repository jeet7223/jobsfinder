<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScrapeJobs */

$this->title = 'Create Scrape Jobs';
$this->params['breadcrumbs'][] = ['label' => 'Scrape Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scrape-jobs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
