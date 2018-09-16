<?php
namespace backend\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    protected $module;


    /**
     * @inheritdoc
     */

    public function init()
    {
      $this->module = Yii::$app->getModule('user');
    }
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if($this->module->loginBy === 'ldap'){
              $ldap = new \backend\modules\user\components\Ldap();
              $ldap->server = $this->module->ldapConfig['server'];
              $ldap->basedn = $this->module->ldapConfig['basedn'];
              $ldap->domain = $this->module->ldapConfig['domain'];
              $ldap->username = $this->username;
              $ldap->password = $this->password;
              $authen = $ldap->Authenticate();
              if(!$user || !$authen['status']){
                  $this->addError($attribute, 'Incorrect username or password.');
              }
            }else{
              if (!$user || !$user->validatePassword($this->password)) {
                  $this->addError($attribute, 'Incorrect username or password.');
              }
            }
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    /*public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }*/

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            //$user = User::findOne(['username' => $this->username]);
            if (($user = User::findOne(['username' => $this->username])) !== null) {
                switch ($user->status) {
                    case User::STATUS_DELETED:
                        $this->addError('username', 'Your user is deactive.');
                        break;
                    case User::STATUS_WAITING:
                        $this->addError('username', 'Your user is not confirm.');
                        break;
                    case User::STATUS_BANNED:
                        $this->addError('username', 'Your user is banned.');
                        break;

                    default:
                        # code...
                        break;
                }
            }

            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
