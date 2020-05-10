<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;

class ResetPasswordForm extends Model
{
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
            [['password', 'passwordRepeat'], 'required', 'message' => 'Field "{attribute}" obligatory'],
            [['password'], 'string', 'min' => 6, 'tooShort' => 'Very short {attribute} (min. 6 characters)'],
            [['passwordRepeat'], 'compare', 'compareAttribute' => 'password', 'message' => "Password mismatch"],
        ];
    }

    public function beforeValidate()
    {
        $this->email = Html::encode(strip_tags($this->password));
        $this->email = Html::encode(strip_tags($this->passwordRepeat));
        return parent::beforeValidate();
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Password',
            'passwordRepeat' => 'Password Repeat'
        ];
    }

    public function resetPassword($user)
    {
        if ($this->validate()) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();
        }

        return false;
    }
}