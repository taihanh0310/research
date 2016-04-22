<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models\Form;

use yii\base\Model;
use app\models\User;
use Yii;
use yii\base\InvalidParamException;

/**
 * Description of ResetPasswordForm
 *
 * @author nthanh
 */
class ResetPasswordForm extends Model
{

    public $password;
    private $_user;

    public function __construct($token, $config = [])
    {
        if(empty($token) || !is_string($token))
        {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }
        $this->_user = User::findByPasswordResetToken($token);
        if(!$this->_user)
        {
            throw new InvalidParamException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     *  reset password
     * @return type
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->password = $this->password;
        $user->removePasswordResetToken();
        return $user->save();
    }

}
