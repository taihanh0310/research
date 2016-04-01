<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property string $id
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $birthdate
 * @property integer $gender_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $avatar
 * @property string $address
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'gender_id', 'deleted_at'], 'required'],
            [['user_id', 'gender_id'], 'integer'],
            [['first_name', 'last_name', 'address'], 'string'],
            [['birthdate', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['avatar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthdate' => 'Birthdate',
            'gender_id' => 'Gender ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'avatar' => 'Avatar',
            'address' => 'Address',
        ];
    }
}
