<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JobSeeker */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Job Seekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="job-seeker-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'username',
                'format'=>'raw',
                'value'=>function($model){
                    $user = User::findOne($model->user_id);
                    return $user->username;
                }
            ],
            [
                'attribute'=>'email',
                'format'=>'raw',
                'value'=>function($model) {
                    $user = User::findOne($model->user_id);
                    return $user->email;
                }
            ],
            [
                'attribute'=>'status',
                'format'=>'raw',
                'value'=>function($model){
                    $user = User::findOne($model->user_id);
                    if($user->status == 10){
                        return "<span class='text text-success'>Active</span>";
                    }
                    else{
                        return "<span class='text text-danger'>Inactive</span>";
                    }
                }
            ],
            [
                'attribute'=>'registration_date',
                'format'=>'date',
                'value'=>function($model){
                    $user = User::findOne($model->user_id);
                    return $user->created_at;
                }
            ],
            'first_name',
            'last_name',
            'contact_number',
            'address:ntext',
            'city',
            'state',
            'country',
            [
                'attribute'=>'gender',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->gender == 0){
                        return "Male";
                    }
                    elseif($model->gender == 1){
                        return "Female";
                    }
                    else{
                        return "Other";
                    }
                }
            ],
            'dob',
            'institution_name',
            'course_name',
            'from_year',
            'to_year',
            'total_experience',
            'skills',
            'professional_title',
            'about_your_self:ntext',
            [
                'attribute'=>'employment_status',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->employment_status == 0){
                        return "Not Employed";
                    }
                    elseif($model->employment_status == 1){
                        return "Self Employed";
                    }
                    elseif($model->employment_status == 2){
                        return "Student";
                    }
                    elseif($model->employment_status == 3){
                        return "Internship";
                    }
                    elseif($model->employment_status == 4){
                        return "Employed";
                    }
                }
            ],
            'about_employment:ntext',
        ],
    ]) ?>

</div>
