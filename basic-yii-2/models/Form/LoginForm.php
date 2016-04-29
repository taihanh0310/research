<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models\Form;

use yii\base\Model;
use app\models\User;
use app\models\Common\PermissionHelpers;
use Yii;

/**
 * Description of LoginForm
 *
 * @author nthanh
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * Rules of method
     */
    public function rules()
    {
        return [
            [ ['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            //validatePassword at user model
            ['password', 'validatePassword'],
        ];
    }

    public function login()
    {
        if($this->validate())
        {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        else
        {
            return false;
        }
    }

    public function getUser()
    {
        if($this->_user === false)
        {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }

    public function loginAdmin()
    {
        if(($this->validate()) && PermissionHelpers::requireMinimumRole('Admin', $this->getUser()->id))
        {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        else
        {

            throw new NotFoundHttpException('You Shall Not Pass.');
        }
    }

    public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

}
