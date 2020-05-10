<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * User model
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const IS_ADMIN = ['user','admin'];
    const IS_ACTIVE = ['inactive','active'];



    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['role', 'default', 'value' => self::ROLE_USER],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['email'], 'required'],
            [['email'], 'trim'],
            [['email'], 'email'],
            [['email',], 'unique', 'message' => 'This "{attribute}" is already registered'],
            [['surname',  'email','name','auth_key'], 'string', 'max' => 255],
            [[ 'created_at', 'updated_at'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created',
            'password' => 'New password',
            'passwordRepeat' => 'Repeat new password',
            'name' => 'Name',
            'surname' => 'Surname',
        ];
    }


    public function getRoleName()
    {
        $list = self::IS_ADMIN;
        return $list[$this->role];
    }

    public function getStatusName()
    {
        $list = [];
        $list[self::STATUS_INACTIVE] = self::IS_ACTIVE[0];
        $list[self::STATUS_ACTIVE] = self::IS_ACTIVE[1];
        return $list[$this->status];

    }

    public function resetPassword()
    {
        if ($this->validate()) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $this->save();

        }

        return false;
    }

    public static function findByEmail($email)
    {
        return self::find()->where(['email' => $email])->one();
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


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
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByAuthKey($auth_key)
    {
        return self::find()->where(['auth_key' => $auth_key])->one();
    }


    public static function userConfirmed()
    {
        if (!Yii::$app->user->isGuest) {
            return (Yii::$app->user->identity->status == 10) ? true : false;
        }

        return false;
    }

    public static function isAdmin($auth_key)
    {
        $admin = self::find()->where(['and', ['auth_key'=> $auth_key], ['role' => self::ROLE_ADMIN]])->one();
        if($admin){
            return true;
        }
        return false;
    }

    public static function Logout()
    {
        Yii::$app->user->logout();

    }

//    public static function LoginAdmin($id)
//    {
//        Yii::$app->urlManager->baseUrl = '/';
//
//        $authKey = Yii::$app->user->identity->authKey;
//        User::Logout();
//        //Yii::$app->user->logout();
//        $user = User::findOne($id);
//        Yii::$app->user->login($user, 3600 * 24 * 30);
//
//        if (User::userConfirmed()) {
//            $authCookie = new \yii\web\Cookie
//            ([
//                'name' => 'from_admin',
//                'value' => $authKey,
//                'expire' => time() + 86400 * 365,
//            ]);
//
//            Yii::$app->getResponse()->getCookies()->add($authCookie);
//            return Yii::$app->controller->redirect(['/newlist/']);
//        } else {
//            return Yii::$app->controller->redirect(Yii::$app->request->referrer ?? Yii::$app->homeUrl);
//        }
//    }

    public function getDate($date)
    {
        return Yii::$app->formatter->asDate($date);
    }

}
