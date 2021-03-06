<?php

namespace app\models;

use Yii;
use app\models\Gender;
use app\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
 * @property Gender $gender Description
 * @property User $user Description
 */
class Profile extends ActiveRecord
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
            [['user_id', 'gender_id'], 'required'],
            [['user_id', 'gender_id'], 'integer'],
            [['first_name', 'last_name', 'address'], 'string'],
            [['birthdate', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['birthdate'], 'date', 'format' => 'Y-m-d'],
            [['avatar'], 'string', 'max' => 255]
        ];
    }

    /**
     * before validate
     */
    public function beforeValidate()
    {
        if($this->birthdate != null)
        {
            $new_date_format = date('Y-m-d', strtotime($this->birthdate));
            $this->birthdate = $new_date_format;
        }
        parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            $this->created_at = $this->updated_at = date('Y-m-d H:i:s');
            return true;
        }
        else
        {
            return false;
        }
    }

    public function beforeDelete()
    {
        if(parent::beforeSave($insert))
        {
            $this->updated_at = $this->deleted_at = date('Y-m-d H:i:s');
            return true;
        }
        else
        {
            return false;
        }
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

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'access2' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action)
                {
                    return PermissionHelpers::requireStatus('Active');
                }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    public function getGenderName()
    {
        return $this->gender->gender_name;
    }

    public static function getGenderList()
    {
        $droptions = Gender::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'gender_name');
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUsername()
    {
        return $this->user->username;
    }

    public function getUserId()
    {
        return $this->user ? $this->user->id : 'none';
    }

    public function getUserLink()
    {
        $url = Url::to(['user/view', 'id' => $this->UserId]);
        $options = [];
        return Html::a($this->getUserName(), $url, $options);
    }

    public function getProfileIdLink()
    {
        $url = Url::to(['profile/update', 'id' => $this->id]);
        $options = [];
        return Html::a($this->id, $url, $options);
    }

}
