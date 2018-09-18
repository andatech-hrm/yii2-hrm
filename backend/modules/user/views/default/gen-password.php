<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'panel' => ['type' => 'primary', 'heading' => $type->title],
    'columns' => [
        'user_id',
        'fullname',
        'username',
        'new_password'
    ]
]);
?>

<?php if (Yii::$app->user->identity->username == 'admin'):
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::submitButton('Gen Password', ['class' => 'btn btn-success', 'name' => 'ok', 'value' => 1]) ?>


    <?php ActiveForm::end(); ?>
    <?php

endif;
?>