<?php
use yii\bootstrap\ActiveForm;
use kuakling\datepicker\DatePicker;

$form = ActiveForm::begin();

echo $form->field($model, 'birthday')->widget(DatePicker::className());


ActiveForm::end();

echo DatePicker::widget([
    'name' => 'check_issue_date',
]);