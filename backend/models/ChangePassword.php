<?php

namespace backend\models;

use Yii;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class ChangePassword extends \common\models\User {

    public $old_password;
    public $password;
    public $confirm_password;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        $rules[] = [['password', 'old_password', 'confirm_password'], 'required'];
        $rules[] = ['old_password', 'string', 'min' => 6];
        //$rules[] = ['old_password', 'findPasswords'];
        $rules[] = ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"];
        return array_merge(parent::rules(), $rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'old_password' => Yii::t('andahrm', 'Old Password'),
            'password' => Yii::t('andahrm', 'Password'),
            'confirm_password' => Yii::t('andahrm', 'Confirm Password'),
        ];
    }

    //matching the old password with your existing password.
    public function findPasswords($attribute, $params) {
        $pass = self::findIdentity(Yii::$app->user->identity->id);
        $hash2 = Yii::$app->security->generatePasswordHash($this->old_password);
        echo $pass->password_hash;
        echo ' : ' . $hash2;
        exit();
        if ($pass->password_hash != $hash2) {
            $this->addError($attribute, 'Old password is incorrect');
        }
    }

    public function changePassword() {
        $user = $this;
        $user->setPassword($this->password);
        return $user->save(false);
    }

}
