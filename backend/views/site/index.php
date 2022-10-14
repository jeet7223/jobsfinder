<?php

/** @var yii\web\View $this */

$this->title = 'Jobsfinder | Dashboard - Admin';
?>
<div class="dashboard-section">
    <div class="row">


        <div class="col-lg-4 col-6">

            <div class="small-box ">
                <div class="inner">
                    <h3><i class="fa fa-download"></i><?= \common\models\JobsData::find()->where
                        (['status'=>1])->count()
                            ?></h3>
                    <p>Total Jobs Data</p>
                </div>

                <a href="<?= \yii\helpers\Url::to(['jobs-data/index'])?>"
                   class="small-box-footer">More info <i
                            class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box ">
                <div class="inner">
                    <h3><i class="fa fa-users"></i><?= \common\models\JobSeeker::find()->count()
                        ?></h3>
                    <p>Total Jobs Seekers</p>
                </div>

                <a href="<?= \yii\helpers\Url::to(['job-seeker/index'])?>"
                   class="small-box-footer">More info <i
                            class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box ">
                <div class="inner">
                    <h3><i class="fa fa-users"></i><?= \common\models\Employer::find()->count()
                        ?></h3>
                    <p>Total Employers</p>
                </div>

                <a href="<?= \yii\helpers\Url::to(['employer/index'])?>"
                   class="small-box-footer">More info <i
                            class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">

            <div class="small-box ">
                <div class="inner">
                    <h3><i class="fa fa-wrench"></i><?= \common\models\ScrapeJobs::find()->count()
                        ?></h3>
                    <p>Total Scrape Jobs Request</p>
                </div>

                <a href="<?= \yii\helpers\Url::to(['scrape-jobs/index'])?>"
                   class="small-box-footer">More info <i
                            class="fa
                fa-arrow-circle-right"></i></a>
            </div>
        </div>




    </div>

</div>