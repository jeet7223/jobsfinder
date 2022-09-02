<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Employer */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Employers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employer-view">

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
            'current_company_name',
            [
                'attribute'=>'employment_type',
                'format'=>'raw',
                'value'=>function($model){
                    if($model->employment_type == 0){
                        return "Not Employed";
                    }
                    elseif($model->employment_type == 1){
                        return "Self Employed";
                    }
                    elseif($model->employment_type == 2){
                        return "Student";
                    }
                    elseif($model->employment_type == 3){
                        return "Internship";
                    }
                    elseif($model->employment_type == 4){
                        return "Employed";
                    }
                }
            ],
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
        ],
    ]) ?>

</div>
