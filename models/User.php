<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;
    const ROLE_SUPERUSER = 30;
    
    public static function tableName()
    {
        return 'usuario';
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
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['Usuario' => $username]);
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->idUsuario;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->Password;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->Password === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->Password === sha1($password);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public static function roleInArray($arr_role)
    {
        return in_array(Yii::$app->user->identity->Nombre, $arr_role);
    }
    
    public static function isActive()
    {
        return Yii::$app->user->identity->idEstado == self::STATUS_ACTIVE;
    }
}
