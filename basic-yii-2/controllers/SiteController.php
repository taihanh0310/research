<?php

namespace app\controllers;
use Yii;
use app\models\Form\SignupForm;
use app\models\Form\LoginForm;

class SiteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionLogin(){
        if(!Yii::$app->user->isGuest){
            return $this->goHome();
        }
        
        //login form
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->goBack();
        }
        else{
            return $this->render('login', [
                'model' => $model
            ]);
        }
    }

        /**
     * 
     * @return type Form
     */
    public function actionSignUp(){
        $model = new SignupForm();
        if($model->load(Yii::$app->request->post())){
            if($user = $model->signup()){
                if(Yii::$app->getUser()->login($user)){
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model
        ]);
    }
}
