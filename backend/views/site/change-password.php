<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('andahrm', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$form = ActiveForm::begin();
?>


<?= $form->field($model, 'old_password')->passwordInput() ?>
<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'confirm_password')->passwordInput() ?>


<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>