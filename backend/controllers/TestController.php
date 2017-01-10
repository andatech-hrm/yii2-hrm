<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
  public function actionIndex()
  {
    echo 'Test';
  }
}