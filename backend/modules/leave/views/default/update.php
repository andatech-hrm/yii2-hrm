<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\leave\models\FormLeave */

$this->title = Yii::t('andahrm/leave', 'Update Form Leave: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('andahrm/leave', 'Form Leaves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('andahrm/leave', 'Update');
?>
<div class="form-leave-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
