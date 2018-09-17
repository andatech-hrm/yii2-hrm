<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->


    <div class="table-responsive">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'id',
                    'headerOptions' => ['style' => 'width: 60px;']
                ],
                'username',
                //'email:email',
                [
                    'attribute' => 'person.fullname',
                    'format' => 'html',
                    'value' => function($model) {
                        return isset($model->person) ? $model->person->getInfoCard(['/person/default/view', 'id' => $model->id]) : null;
                    },
                    'label' => 'Fullname',
                ],
                [
                    'attribute' => 'status',
                    'value' => 'statusName',
                    'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->statusList, ['class' => 'form-control', 'prompt' => '-- All --']),
                ],
                // 'created_at',
                // 'updated_at',
                //['class' => 'yii\grid\ActionColumn'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{log-on} {view} {update}',
                    'buttons' => [
                        'log-on' => function($url, $model, $key) {
                            $originalUserId = Yii::$app->session->get('user.idbeforeswitch');
                            $currentUserId = Yii::$app->user->id;
                            if ($originalUserId !== $model->id and $currentUserId !== $model->id) {
                                return Html::a('<span class="glyphicon glyphicon-log-in"></span> &nbsp;', $url, [
                                            'title' => 'Switch user',
                                            'aria-label' => 'View',
                                            'data-pjax' => '0',
                                            'data-confirm' => 'Are you sure you want to switch user?'
                                ]);
                            }
                        }
                    ]
                ],
            ],
        ]);
        ?>
    </div>
</div>
