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
class SignupForm extends Model{
    public $username;
    public $email;
    public $password;
    
    public function signup(){
        if($this->validate()){
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }
}
