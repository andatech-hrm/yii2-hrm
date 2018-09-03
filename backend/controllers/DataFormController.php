<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
#---
use andahrm\person\models\Person;

class DataFormController extends \yii\web\Controller {

    public function actionPersonList($q = null, $id = null) {
        Yii::$app->response->format = Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            //$this->code = $q;
            $model = Person::find();
            //$model->andWhere(['emp_active' => '1']);
            $datas = explode(" ", $q);
            foreach ($datas as $data) {
                $model->andFilterWhere(['or',
                    ['like', 'user_id', $data],
                    ['like', 'firstname_th', $data],
                    ['like', 'lastname_th', $data]
                ]);
//                        ->orFilterWhere(['like', 'emp.emp_name', $data])
//                        ->orFilterWhere(['like', 'emp.emp_surname', $data]);
            }
            $out['results'] = ArrayHelper::getColumn($model->limit(20)->all(), function($model) {
                        return ['id' => $model->user_id, 'text' => $model->fullname];
                    });
        }
        //return $this->renderContent('');
        return $out;
    }


}
