<?php

use common\models\Employer;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EmployerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            'first_name',
            'last_name',
            'contact_number',
            [
                'attribute'=>'registration_date',
                'format'=>'date',
                'value'=>function($model){
                    $user = User::findOne($model->user_id);
                    return $user->created_at;
                }
            ],
            //'address:ntext',
            //'city',
            //'state',
            //'country',
            //'current_company_name',
            //'employment_type',
            //'gender',
            //'dob',
            //'profile_image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Employer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
