<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\leave\models\FormLeaveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('andahrm/leave', 'Form Leaves');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-leave-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('andahrm/leave', 'Create Form Leave'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'year',
            'to',
            'user_id',
            'leave_type_id',
            //'contact',
            //'date_start',
            //'start_part',
            //'date_end',
            //'end_part',
            //'number_day',
            //'reason:ntext',
            //'acting_user_id',
            //'status',
            //'commander_comment',
            //'commander_status',
            //'commander_by',
            //'commander_at',
            //'inspector_comment',
            //'inspector_status',
            //'inspector_by',
            //'inspector_at',
            //'director_comment',
            //'director_status',
            //'director_by',
            //'director_at',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
