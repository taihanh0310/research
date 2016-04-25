<?php

namespace app\controllers;

use Yii;
use app\models\Common\PermissionHelpers;
use app\models\Profile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class UpgradeController extends \yii\web\Controller
{

//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index'],
//                'rules' => [
//                    'actions' => ['index'],
//                    'allow' => true,
//                    'roles' => ['@'],
//                    'matchCallback' => function ($rule, $action)
//            {
//                return PermissionHelpers::requireStatus('active');
//            }
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }

    public function actionIndex()
    {
        $name = Yii::$app->user->identity->username;
        return $this->render('index', ['name' => $name]);
    }

    public function actionUpdate()
    {
        if($model = Profile::find()->where(['user_id' =>
                    Yii::$app->user->identity->id])->one())
        {
            if($model->load(Yii::$app->request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
        else
        {
            throw new NotFoundHttpException('No Such Profile.');
        }
    }

}
