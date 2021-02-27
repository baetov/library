<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email Email
 * @property string $name Имя
 * @property string $phone Телефон
 * @property string $position Должность
 * @property string $password_hash Зашифрованный пароль
 * @property string $created_at
 * @property bool $is_company_super_admin Является ли администратором компании
 * @property bool $is_deletable Можно удалить или нельзя
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['created_at','password'], 'safe'],
            [['is_company_super_admin', 'is_deletable'], 'boolean'],
            [['email', 'name', 'phone', 'position', 'password_hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'position' => 'Должность',
            'password_hash' => 'Зашифрованный пароль',
            'created_at' => 'Created At',
            'is_company_super_admin' => 'Является ли администратором компании',
            'is_deletable' => 'Можно удалить или нельзя',
            'password' => 'Пароль'
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if($this->password != null){
                $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            }

            return true;
        }
        return false;
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
    /**
     * Суперадмин или нет
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->position == 'administrator';
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->password;
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
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
