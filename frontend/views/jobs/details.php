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
                    <div class="single-job-items mb-50">
                        <div class="job-items">

                            <div class="job-tittle">
                                <a href="#">
                                    <h4><?= $job_details->job_title ?></h4>
                                </a>
                                <ul>
                                    <li>Creative Agency</li>
                                    <li><i class="fas fa-map-marker-alt"></i><?= $job_details->job_location ?></li>
                                    <li>$3500 - $4000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p><?= $job_details->job_description ?></p>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
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
                            <li>Vacancy : <span>02</span></li>
                            <li>Job nature : <span>Full time</span></li>
                            <li>Salary :  <span>$7,800 yearly</span></li>
                            <li>Application date : <span>12 Sep 2020</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="<?= Url::to(['jobs/','aaply_link'=>$job_details->apply_link,'id'=>$job_details->id]) ?>" class="btn" target="_blank" data-pjax="0">Apply Now</a>
                        </div>
                    </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Company Information</h4>
                        </div>
                        <span><?= $job_details->company_name ?></span>
                        <p><?= $job_details->about_the_company ?></p>
                        <ul>
                            <?php if(!empty($job_details->person_name))
                            {
                                echo "<li>Person Name: <span>$job_details->person_name</span></li>";
                            } ?>
                            <li>Name:<span><?= $job_details->company_name ?></span></li>
                            <li>Web : <span> colorlib.com</span></li>
                            <li>Email: <span>carrier.colorlib@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>