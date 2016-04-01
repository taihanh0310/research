<?php

namespace app\models;

use Yii;
use app\models\Role;
use yii\helpers\ArrayHelper;
use app\models\Status;
use app\models\UserType;
use app\models\Profile;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $user_type_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_by
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['role_id', 'status_id', 'user_type_id'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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
        ];
    }

    /*
     * Get role relationship
     *
     */

    public function getRole() {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /*
     * get role name
     */

    public function getRoleName() {
        return $this->role ? $this->role->role_name : '- no role -';
    }

    /*
     * get list role for dropdown
     * 
     */

    public static function getRoleList() {
        $dropdown = Role::find()->asArray()->all();
        return ArrayHelper::map($dropdown, 'id', 'role_name');
    }

    /*
     * End role relationship
     */

    /**
     * Status relationship
     */
    public function getStatus() {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    //get status name
    public function getStatusName() {
        return $this->status ? $this->status->status_name : ' - no status - ';
    }

    //get status for dropbox
    public function getStatusList() {
        $statusList = Status::find()->asArray()->all();
        return ArrayHelper::map($statusList, 'id', 'status_name');
    }

    //end status relationship

    /**
     * Relationship Usertype
     */
    //get usertyoe
    public function getUserType() {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * get user type name
     *
     */
    public function getUserTypeName() {
        return $this->userType ? $this->userType->user_type_name : '- no user type -';
    }

    /**
     * get list of user types for dropdown
     */
    public static function getUserTypeList() {
        $droptions = UserType::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'user_type_name');
    }

    /**
     * get user type id
     *
     */
    public function getUserTypeId() {
        return $this->userType ? $this->userType->id : 'none';
    }

    //end Relationship usertype
}
