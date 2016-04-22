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

/**
 * Description of PasswordResetRequestForm
 *
 * @author nthanh
 */
class PasswordResetRequestForm extends Model
{

    public $email;

    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist', 'targetClass' => 'app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * @Description: sending email
     * @return boolean
     */
    public function sendEmail()
    {
        $condition = [
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ];
        //get user by email
        $user = User::getUserByCondition($condition);
        if($user)
        {
            if(!User::isPasswordResetTokenValid($user->password_reset_token))
            {
                $user->generatePasswordResetToken();
            }
            if($user->save())
            {
                return Yii::$app->mailer->compose(['html' => 'passwordResetToken-html',
                                    'text' => 'passwordResetToken-text'], ['user' => $user])
                                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                                ->setTo($this->email)
                                ->setSubject('Password reset for ' . Yii::$app->name)
                                ->send();
            }
        }
        return false;
    }

}
