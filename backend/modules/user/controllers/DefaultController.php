<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\modules\user\models\User;
use backend\modules\user\models\UserSearch;
use backend\modules\user\models\Profile;
use backend\modules\user\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\modules\user\filters\AccessRule;
use yii\data\ArrayDataProvider;

/**
 * AdminController implements the CRUD actions for User model.
 */
class DefaultController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['log-off'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        //'actions' => ['index'],
                        'allow' => true,
                        'roles' => $this->module->admins,
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        //print_r(Yii::$app->user->identity);
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $user = new User(['scenario' => 'create']);
//        $profile = new Profile();
//
//        if ($user->load(Yii::$app->request->post())) {
//            $user->setPassword(Yii::$app->request->post('User')['newPassword']);
//            $user->generateAuthKey();
//            $user->save();
//            return $this->redirect(['view', 'id' => $user->id]);
//            //print_r($user->attributes);
//        } else {
//            return $this->render('create', [
//                'user' => $user,
//                'profile' => $profile,
//            ]);
//        }
//    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $user = $this->findModel($id);
        $profile = $user->profile;

        if ($user->load(Yii::$app->request->post())) {
            $user->setPassword(Yii::$app->request->post('User')['newPassword']);
            $user->generateAuthKey();
            if ($user->save()) {
                $profile->load(Yii::$app->request->post());
                $profile->save();
                return $this->redirect(['view', 'id' => $user->id]);
            }
        } else {
            return $this->render('update', [
                        'user' => $user,
                        'profile' => $user->profile
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    public function actionLogOn($id) {
        $initialId = Yii::$app->user->id;
        if ($id == $initialId) {
            //Same user!
        } else {
            $user = User::findOne($id);
            $duration = 0;
            Yii::$app->user->switchIdentity($user, $duration);
            Yii::$app->session->set('user.idbeforeswitch', $initialId);
            return $this->redirect(['default/index']);
        }
    }

    public function actionLogOff() {
        $originalId = Yii::$app->session->get('user.idbeforeswitch');
        if ($originalId) {
            $user = User::findOne($originalId);
            $duration = 0;
            Yii::$app->user->switchIdentity($user, $duration);
            Yii::$app->session->remove('user.idbeforeswitch');
        }
        return $this->redirect(['admin/index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGenPassword($start = 0) {
        $step = 30;
        $offset = $start + $step;
        $modelUser = User::find()
                ->with('person')
                ->where(['NOT IN', 'id', ['2', '209']])
                //->andWhere(['>=', 'updated_at', strtotime('2018-09-17')])
                ->andWhere(['status' => [User::STATUS_WAITING, null]])
        ;
        $datas = [];
//        print_r(Yii::$app->request->post());
//        exit();
        if (Yii::$app->request->post('ok') || $start > 0) {

//            $modelUser = User::find()
//                    ->where(['NOT IN', 'id', ['2', '209']]);
            $modelUserData = $modelUser->limit($step)
                    ->offset(0)
                    ->all();
//            $count = $modelUser->count();
//            echo $count;
            $count = count($modelUserData);
            //exit();
            $errors = [];
            foreach ($modelUserData as $model) {
                $new_password = "123456";
//                print_r($model);
//                exit();
                if (isset($model->person) && $citizen_id = $model->person->citizen_id) {
                    $new_password = substr($citizen_id, -4);
                }
                $model->setPassword($new_password);
                $model->generateAuthKey();
                $model->status = User::STATUS_ACTIVE;
                if (!$model->save()) {
                    $errors[] = $model->getErrors();
                }
            }
            if (!$errors) {
                Yii::$app->getSession()->setFlash('saved', [
                    'type' => 'success',
                    'msg' => Yii::t('andahrm/leave', 'The system successfully sent.')
                ]);

                if ($count) {
//                    echo $count;
//                    exit();
                    return $this->redirect(['gen-password', 'start' => $start + 1]);
                } else {
                    return $this->redirect(['gen-password', 'success' => $count]);
                    //return $this->redirect(['gen-password', 'start' => $offset]);
                }
            } else {
                print_r($errors);
                exit();
            }
        }


        $modelUser = $modelUser->all();
        foreach ($modelUser as $model) {
            $data = [];
            $new_password = "123456";
            if (isset($model->person) && $citizen_id = $model->person->citizen_id) {
                $new_password = substr($citizen_id, -4);
                $data['fullname'] = (isset($model->person->fullname) ? $model->person->fullname : '');
            }
            $data['user_id'] = $model->id;
            $data['username'] = $model->username;
            $data['new_password'] = $new_password;
            $datas[] = $data;
        }
        //echo count($data);
        $dataProvider = new ArrayDataProvider([
            'allModels' => $datas
        ]);


        return $this->render('gen-password', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
