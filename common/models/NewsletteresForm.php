<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use common\models\User;
use common\models\Newsletteres;


class NewsletteresForm extends Model
{
    public $email;
    public $user_id;
    public $categories_id;

    public function rules()
    {
        return [
            [['email'], 'required', 'message' => 'Field "{attribute}" obligatory'],
            [['user_id'], 'integer'],
            [['categories_id'], 'integer'],
            [['categories_id'], 'required'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'email'],
        ];
    }

    public function saveNewsletter()
    {
        $newsletteres = new Newsletteres();
        $newsletteres->user_id = Yii::$app->user->id;
        $newsletteres->categories_id = $this->categories_id;
        return $newsletteres->save();

    }

    public static function Subscribe($categories_id){
        $letteres = Newsletteres::find()->where(['categories_id'=>$categories_id])->all();
        if (!empty($letteres)) {
            foreach ($letteres as $lettere){
            $mail = Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setTo($lettere->getUser()->one()->email)
                ->setSubject('Уведомление с сайта NewLists.com')
                ->setTextBody('Здравствуйте! Мы обновили наш сайт и добавили новости.
                                   Служба поддержки проекта NewLists.com');
                 return $mail->send();
            }
        } else {
            return false;
        }
    }

}