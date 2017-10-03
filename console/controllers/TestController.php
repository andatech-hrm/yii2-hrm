<?php
namespace console\controllers;
 
use Yii;
use yii\helpers\Url;
use yii\console\Controller;
 
/**
 * Test controller
 */
class TestController extends Controller {
    
    
    public $message;
    
    public function options($actionID)
    {
        return ['message'];
    }
    
    public function optionAliases()
    {
        return ['m' => 'message'];
    }
    
 
    public function actionIndex() {
        echo "Yes, cron service is running. ".date("Y-m-d H:i:s")."\n";
    }
    
    public function actionHour() {
        echo "Yes, cron service is running. ".date("Y-m-d H:i:s").' '.$this->message."\n";
    }
}