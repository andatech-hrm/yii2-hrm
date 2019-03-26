<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use andahrm\person\models\Person;

/* @var $this yii\web\View */
/* @var $user backend\modules\user\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="x_panel panel-<?= $user->isNewRecord ? 'success' : 'primary' ?>">
    <div class="x_title">   

        <?= Html::tag('h2', $this->title) ?>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        <div class="row">
            <div class="col-sm-6">
                <h3>Account</h3>

                <?= $form->field($user, 'username')->textInput(['readonly' => Yii::$app->user->identity->username != 'admin'])
                ?>

                <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($user, 'status')->dropDownList($user->statusList) ?>

                <?= $form->field($user, 'newPassword')->passwordInput() ?>

                <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>
            </div>


            <div class="col-sm-6">
                <h3>Profile</h3>

                <?php
                $profile->firstname = $user->person->firstname_th;
                $profile->lastname = $user->person->lastname_th;
                ?>

                <?= $form->field($profile, 'firstname')->textInput(['readonly' => true]) ?>

                <?= $form->field($profile, 'lastname')->textInput(['readonly' => true]) ?>

                <br/>
                <h3>Roles</h3>
                <?=
                $mkey = 'roles';
                $roleList = Person::getRoleList();
                //unset($roleList['president']);
                $roles = Yii::$app->authManager->getRolesByUser($user->id);
                echo Html::checkBoxList('Roles', array_keys($roles), $roleList, ['separator' => '<br/>','label'=>false]);
                ?>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /.panel-body -->
    <div class="x_footer">
        <?= Html::submitButton($user->isNewRecord ? 'Create' : 'Update', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-flat pull-right']) ?>
        <div class="clearfix"></div>
    </div>
    <!-- /.panel-footer -->

</div>

<?php ActiveForm::end(); ?>
