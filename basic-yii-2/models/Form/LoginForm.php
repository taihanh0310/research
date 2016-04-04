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
 * Description of LoginForm
 *
 * @author nthanh
 */
class LoginForm extends Model {
    public $usename;
    public $password;
    
    public function login(){
        return null;
    }
}
