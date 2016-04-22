<?php

namespace app\models;

use Yii;
use app\models\Role;
use app\models\Status;
use app\models\UserType;
use app\models\Profile;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $user_type_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer @deleted_at
 * @property string @created_by
 * @property string @updated_by
 * @property string @deleted_by
 * @property string $password write-only password
 * @property Profile $profile Description
 * @property Status $status Description
 * @property Role $role Description
 * @property UserType $userType Description
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status_id', 'default', 'value' => self::STATUS_ACTIVE],
            [ ['status_id'], 'in', 'range' => array_keys($this->getStatusList())],
            ['role_id', 'default', 'value' => 1],
            [ ['role_id'], 'in', 'range' => array_keys($this->getRoleList())],
            ['user_type_id', 'default', 'value' => 1],
            [ ['user_type_id'], 'in', 'range' => array_keys($this->getUserTypeList())],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role_id' => 'Role ID',
            'status_id' => 'Status ID',
            'user_type_id' => 'User Type ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deleted_by' => 'Deleted By',
            //add other atribute labels
            'roleName' => Yii::t('app', 'Role'),
            'statusName' => Yii::t('app', 'Status'),
            'profileId' => Yii::t('app', 'Profile'),
            'profileLink' => Yii::t('app', 'Profile'),
            'userLink' => Yii::t('app', 'User'),
            'username' => Yii::t('app', 'User'),
            'userTypeName' => Yii::t('app', 'User Type'),
            'userTypeId' => Yii::t('app', 'User Type'),
            'userIdLink' => Yii::t('app', 'ID'),
        ];
    }

    /*
     * Get role relationship
     *
     */

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /*
     * get role name
     */

    public function getRoleName()
    {
        return $this->role ? $this->role->role_name : '- no role -';
    }

    /*
     * get list role for dropdown
     * 
     */

    public static function getRoleList()
    {
        $dropdown = Role::find()->asArray()->all();
        return ArrayHelper::map($dropdown, 'id', 'role_name');
    }

    /*
     * End role relationship
     */

    /**
     * Status relationship
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    //get status name
    public function getStatusName()
    {
        return $this->status ? $this->status->status_name : ' - no status - ';
    }

    //get status for dropbox
    public function getStatusList()
    {
        $statusList = Status::find()->asArray()->all();
        return ArrayHelper::map($statusList, 'id', 'status_name');
    }

    //end status relationship

    /**
     * Relationship Usertype
     */
    //get usertyoe
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * get user type name
     *
     */
    public function getUserTypeName()
    {
        return $this->userType ? $this->userType->user_type_name : '- no user type -';
    }

    /**
     * get list of user types for dropdown
     */
    public static function getUserTypeList()
    {
        $droptions = UserType::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_type_name');
    }

    /**
     * get user type id
     *
     */
    public function getUserTypeId()
    {
        return $this->userType ? $this->userType->id : 'none';
    }

    //end Relationship usertype

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    public function getProfileId()
    {
        return $this->profile ? $this->profile->id : 'none';
    }

    /**
     * @getProfileLink
     * 
     */
    public function getProfileLink()
    {
        $url = Url::to(['profile/view', 'id' => $this->profileId]);
        $options = [];
        return Html::a($this->profile ? 'profile' : 'none', $url, $options);
    }

    public function getUserIdLink()
    {
        $url = Url::to(['user/update', 'id' => $this->id]);
        $options = [];
        return Html::a($this->id, $url, $options);
    }

    /**
     * @getUserLink
     * 
     */
    public function getUserLink()
    {
        $url = Url::to(['user/view', 'id' => $this->id]);
        $options = [];
        return Html::a($this->username, $url, $options);
    }

    /**
     * Get user by Id
     * @param type $id
     * @return User
     */
    public static function findIdentity($id)
    {
        return static::findOne([
                    'id' => $id,
                    'status' => self::STATUS_ACTIVE
        ]);
    }

    /**
     * 
     * @param type $token
     * @param type $type
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * 
     * @param type $username
     * @return type
     */
    public static function findByUserName($username)
    {
        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * 
     * @param type $condition
     * @return type
     */
    public static function getUserByCondition($condition)
    {
        return static::findOne($condition);
    }

    /**
     * 
     * @param type $token
     * @return type
     */
    public static function findByPasswordResetToken($token)
    {
        if(!static::isPasswordResetTokenValid($token))
        {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * 
     * @param type $token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if(empty($token))
        {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @getAuthKey
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @validateAuthKey
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     * broken into 2 lines to avoid wordwrapping
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}
