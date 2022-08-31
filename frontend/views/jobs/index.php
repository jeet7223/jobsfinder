<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $jobsProvider \common\models\JobsData */
/* @var $searchModel \common\models\JobsData */

$this->title = 'Jobs Listing'
?>
    <div class="all-requests-index">
        <div class="text-center">
            <h2><strong><span style="color: #fb246a">Jobs</span> Listings</strong></h2>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="container query-details-tab" id="form-container"
                     style="margin-top:40px">
                   Filter will be here
                </div>
            </div>
            <div class="col-md-8">
                <?php Pjax::begin(['id'=>'home-pjax']);?>
                <?=

                ListView::widget([
                    'dataProvider' => $jobsProvider,
                    'itemView' => '_jobs',
                    'itemOptions' => ['class' => 'col-lg-12'],
                    'options' => [

                        'class' => 'row',
                        'id'=>false

                    ],
                    'emptyText' => ' <h2><strong><span style="color: #fb246a">No</span> Request Found</strong></h2>'
                ]);
                ?>

                <?php Pjax::end();?>
            </div>
        </div>

    </div>
<?php

$script = <<< JS

     setInterval(function(){ 
        $.pjax.reload({container: '#home-pjax', async: false});  
      }, 3000);


JS;
$this->registerJs($script);
?>