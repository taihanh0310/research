<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models\Form;

use yii\base\Model;
use app\models\User;

/**
 * Description of SignupForm
 *
 * @author nthanh
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;

    /**
     * 
     * @return type
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique',
                'targetClass' => '\app\models\User',
                'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => '\app\models\User',
                'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->created_by = $this->email;
            $user->updated_by = $this->email;
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }

}
