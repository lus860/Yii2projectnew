<?php

namespace frontend\models;


use common\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

class SignupForm extends Model
{
    public $email;
    public $password;
    public $passwordRepeat;
    public $name;
    public $surname;
    public $auth_key;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'passwordRepeat'], 'required', 'message' => 'Field "{attribute}" obligatory'],
            [['email'], 'trim'],
            [['email'], 'email', 'message' => 'Invalid email format'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],
            [['name','surname',  'email','auth_key'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Very short {attribute} (min 6 characters)'],
            [['passwordRepeat'], 'compare', 'compareAttribute' => 'password', 'message' => "Password mismatch"],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
            'passwordRepeat' => 'Password Repeat'
        ];
    }

    public function beforeValidate()
    {
        //strip_tags() -- Удаляет HTML и PHP тэги из
        $this->email = Html::encode($this->email);
        $this->name = Html::encode($this->name);
        $this->surname = Html::encode($this->surname);
        $this->password = Html::encode($this->password);
        $this->password = Html::encode($this->passwordRepeat);

        return parent::beforeValidate();
    }

    /**
     * @return User | null
     * @throws \yii\base\Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $this->email;
            $user->surname = $this->surname;
            $user->name = $this->name;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            if ($user->save()) {
                return $user;
            }
        }
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->email = $this->email;
        $user->surname = $this->surname;
        $user->name = $this->name;
        $user->auth_key = Yii::$app->security->generateRandomString();
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        return $user->save() && $this->sendEmail($this->email);

    }

    protected function sendEmail($email)
    {
        $user = User::findByEmail($email);

        if (!empty($user)) {
            $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/confirm-email', 'authKey' => $user->auth_key]);
            $mail = Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setTo($email)
                ->setSubject('Уведомление с сайта NewLists.com')
                ->setTextBody('Здравствуйте! 
                                   Вы отправили запрос на регистрацию. Для того чтобы подтвердить свой Email, перейдите по ссылке' . Html::a(Html::encode($resetLink), $resetLink) . '
                                   Если ссылка не открывается, тогда скопируйте её и вставьте в браузер ' . Html::a(Html::encode($resetLink), $resetLink) . '
                                   Пожалуйста, проигнорируйте данное письмо, если оно попало к Вам по ошибке.
                                   С уважением,
                                   Служба поддержки проекта NewLists.com')
                ->setHtmlBody('<h2>Здравствуйте!</h2>
                                    <p>Вы отправили запрос на регистрацию. Для того чтобы подтвердить свой Email, перейдите по <a href="' . $resetLink . '">ссылке</a></p>
                                    <br>
                                    <p>Если ссылка не открывается, тогда скопируйте её и вставьте в браузер ' . $resetLink . '</p>
                                    <br>
                                    <p>Пожалуйста, проигнорируйте данное письмо, если оно попало к Вам по ошибке.</p>
                                    <br>
                                    <br>
                                    <p>С уважением, 
                                    <br>Служба поддержки проекта <a>NewLists.com</a></p>');

            return $mail->send();

        } else {
            return false;
        }
    }

}