<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\leave\models\FormLeave */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-leave-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'leave_type_id')->textInput() ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?= $form->field($model, 'start_part')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

    <?= $form->field($model, 'end_part')->textInput() ?>

    <?= $form->field($model, 'number_day')->textInput() ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'acting_user_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'commander_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commander_status')->textInput() ?>

    <?= $form->field($model, 'commander_by')->textInput() ?>

    <?= $form->field($model, 'commander_at')->textInput() ?>

    <?= $form->field($model, 'inspector_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inspector_status')->textInput() ?>

    <?= $form->field($model, 'inspector_by')->textInput() ?>

    <?= $form->field($model, 'inspector_at')->textInput() ?>

    <?= $form->field($model, 'director_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'director_status')->textInput() ?>

    <?= $form->field($model, 'director_by')->textInput() ?>

    <?= $form->field($model, 'director_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('andahrm/leave', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
