<?php
namespace app\models;

use Yii;
use yii\base\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntryForm
 *
 * @author nthanh
 */
class EntryForm extends Model{
    //put your code here
    public $name;
    public $email;
    
    public function rules() {
        return [
            [['name','email'],'required'],
            ['email','email']
        ];
    }
}
