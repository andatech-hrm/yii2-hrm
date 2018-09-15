<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'test-form'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@yiister/gentelella/views/error',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        // $models['person'] = \andahrm\person\models\PersonSearch::find()->all();
        $models['person'] = $this->dataProvider('\andahrm\person\models\PersonSearch');
        return $this->render('index', ['models' => $models]);
    }

    private function dataProvider($model) {
        $searchModel = new $model();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 5;

        return (object) [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel
        ];
    }

    public function actionTestForm() {
        $model = \andahrm\person\models\Person::findOne(Yii::$app->user->id);

        return $this->render('test-form', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionChangePassword() {
        $model = \backend\models\ChangePassword::findOne(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post())) {

            //$model->password = $model->new_pwd;
            if (!$valid = $model->validatePassword($model->old_password)) {
                $model->addError('old_password', 'Old password is incorrect');
            }
            if ($valid && $model->changePassword()) {
                return $this->goHome();
            } else {
//                print_r($model->validatePassword($model->old_password));
//                print_r($model->validate());
//                print_r($model->getErrors());
//                exit();
            }
        }

        return $this->render('change-password', [
                    'model' => $model,
        ]);
    }

}
