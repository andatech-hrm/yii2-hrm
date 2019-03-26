<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\leave\models\FormLeave */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('andahrm/leave', 'Form Leaves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-leave-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('andahrm/leave', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('andahrm/leave', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('andahrm/leave', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'year',
            'to',
            'user_id',
            'leave_type_id',
            'contact',
            'date_start',
            'start_part',
            'date_end',
            'end_part',
            'number_day',
            'reason:ntext',
            'acting_user_id',
            'status',
            'commander_comment',
            'commander_status',
            'commander_by',
            'commander_at',
            'inspector_comment',
            'inspector_status',
            'inspector_by',
            'inspector_at',
            'director_comment',
            'director_status',
            'director_by',
            'director_at',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
