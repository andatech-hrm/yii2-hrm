<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user backend\modules\user\models\User */

$this->title = 'Update User: ' . $user->person->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->id, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <?=
    $this->render('_form', [
        'user' => $user,
        'profile' => $profile
    ])
    ?>

</div>
