<?php

namespace app\controllers;

use Yii;
use app\models\Form\SignupForm;
use app\models\Form\LoginForm;
use app\models\Form\PasswordResetRequestForm;
use app\models\Form\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Form\ContactForm;
use app\models\ValueHelpers;
use yii\base\Controller;
use kartik\social\Module;

class SiteController extends Controller
{
   
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'captcha'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['captcha'],
                        'allow' => true,
                        'roles' => ['?', '@'],
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
     * 
     * @return type
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logout function
     * @return type
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        //return $this->goHome();
        return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
    }

    /**
     * 
     * @return View(about)
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    //Beginning Access Controller
    /**
     * The method on the controller is action login
     * @return type
     */
    public function actionLogin()
    {
        //Check user not is guest, redirect to Home page
        if(!Yii::$app->user->isGuest)
        {
            //return $this->goHome();
            return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
        }
        //login form
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            //return $this->goBack();
            return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
        }
        else
        {
            return $this->render('login', [
                        'model' => $model
            ]);
        }
    }

    /**
     * 
     * @return type Form
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if($model->load(Yii::$app->request->post()))
        {
            if($user = $model->signup())
            {
                if(Yii::$app->getUser()->login($user))
                {
                    //return $this->goHome();
                    return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
                }
            }
        }
        return $this->render('signup', [
                    'model' => $model
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if($model->load(Yii::$app->request->post()) && $model->validate())
        {
            if($model->sendEmail(Yii::$app->params['adminEmail']))
            {
                Yii::$app->session->setFlash('success', 'Thanh you for contacting us. We will respond to you as soon as possible. ');
            }
            else
            {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }
            //return $this->refresh();
            return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
        }
        else
        {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionResetPassword($token)
    {
        try
        {
            $model = new ResetPasswordForm($token);
        }
        catch(InvalidParamException $e)
        {
            throw new BadRequestHttpException($e->getMessage());
        }
        if($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword())
        {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');
            //return $this->goHome();
            return $this->redirect(Yii::$app->urlManager->createUrl("site/index"));
        }
        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    //end Beginning Access Controller
}
