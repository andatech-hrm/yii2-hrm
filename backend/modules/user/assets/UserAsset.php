<?php
namespace backend\modules\user\assets;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class UserAsset extends AssetBundle
{
    public $sourcePath = '@anda/user/client';
    public $css = [
    	'css/adminlte2-fixed.css'
    ];
    public $js = [
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
