<?php
/* @var $job_details \common\models\JobsData*/
use yii\helpers\Url;
$this->title = $job_details->job_title;
?>
<main>



    <!-- job post company Start -->
    <div class="job-post-company">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="shadow-div" id="form-container">
                        <div class="job-items">

                            <div class="job-tittle">
                                <a href="#">
                                    <h4 style="color: #fb246a"><?= $job_details->job_title ?></h4>
                                </a>
                                <ul>
                                    <li><?= $job_details->company_name ?></li>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $job_details->job_location ?></li>
                                </ul>
                            </div>

                    </div>
                    </div>
                    <!-- job single End -->
                    <div class="shadow-div" id="form-container">
                        <h2><strong><span style="color: #fb246a">About</span> Job
                            </strong></h2>
                    <div class="job-post-details">
                        <div class="post-details1">
                            <p><?= $job_details->job_description ?></p>
                        </div>
                    </div>
                    </div>
                    <div class="shadow-div" id="form-container">
                        <h2><strong><span style="color: #fb246a">Company</span> Information </strong></h2>
                    <div class="post-details4">
                        <!-- Small Section Tittle -->

                        <span><?= $job_details->company_name ?></span>
                        <p><?= $job_details->about_the_company ?></p>
                        <ul>
                            <?php if(!empty($job_details->person_name))
                            {
                                echo "<li>Person Name: <span>$job_details->person_name</span></li>";
                            } ?>
                            <li>Name:<span><?= $job_details->company_name ?></span></li>
                        </ul>
                    </div>
                </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="shadow-div" id="form-container">


                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date : <span><?php
                                    $formatter = \Yii::$app->formatter;
                                    echo $formatter->asDate($job_details->created_date, 'long');
                                     ?>
                                </span></li>
                            <li>Location : <span><?= $job_details->job_location ?></span></li>
                            <li>Job nature : <span>Full time</span></li>
                        </ul>
                        <br>
                        <div class="apply-btn2">
                            <a href="<?= $job_details->apply_link ?>" class="btn" target="_blank" >Apply Now</a>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>