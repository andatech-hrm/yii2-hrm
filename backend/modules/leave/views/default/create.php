<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\leave\models\FormLeave */

$this->title = Yii::t('andahrm/leave', 'Create Form Leave');
$this->params['breadcrumbs'][] = ['label' => Yii::t('andahrm/leave', 'Form Leaves'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-leave-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
