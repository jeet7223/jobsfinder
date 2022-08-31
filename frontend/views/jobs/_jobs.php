<?php
/* @var $model \common\models\JobsData */

use yii\helpers\Url;

?>
<div class="job-card mb-3" id="form-container">
    <div class="job-title">
        <h5><b><?= $model->job_title?></b></h5>
    </div>
    <div class="company-name">
        <h5><i class="fa-solid fa-building"></i> <?= $model->company_name?></h5>
    </div>    
    <div class="job-location">
    <p><i class="fa-solid fa-location-dot"></i>
        <?= $model->job_location?></p>
    </div>
    <div class="job-description">
        <?php 
            $str = strip_tags($model->job_description);
            $out = strlen($str) > 450 ? substr($str,0,450)."..." : $str;
            echo $out;
        ?>
    </div>
    <br>
    <a href="<?= Url::to(['jobs/details','id'=>$model->id]) ?>" class="btn head-btn1" target="_blank" data-pjax="0">View Details</a>
</div>