<?php
/*
 * This file is part of the Andatech project.
 *
 * (c) Andatech project <http://github.com/andatech/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace backend\modules\user\filters;
/**
 * Access rule class for simpler RBAC.
 * @see http://yii2-user.dmeroff.ru/docs/custom-access-control
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class AccessRule extends \yii\filters\AccessRule
{
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!\Yii::$app->user->isGuest && in_array(\Yii::$app->user->identity->username, \Yii::$app->controller->module->admins)) {
                return true;
            }
        }

        return false;
    }
}