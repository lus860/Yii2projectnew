<?php
namespace common\widgets\newlist;

use Yii;
use yii\helpers\Html;
use common\models\Category;
use yii\bootstrap\Widget;
use common\models\User;
use common\models\Newsletteres;
use common\models\NewsletteresForm;


class NewsletterWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $newsletter = new NewsletteresForm();
        $categories = Category::find()->all();
        if (!Yii::$app->user->isGuest) {
        if ($newsletter->load(Yii::$app->request->post())) {
            if(Newsletteres::SelectUser($newsletter->categories_id) == null){
                if($newsletter->email == Yii::$app->user->identity->email && $newsletter->saveNewsletter()){
                   Yii::$app->controller->refresh();
                   return;

                }
            }
        }
        } else {
            Yii::$app->getSession()->setFlash('isguest', 'Register on the site!');

        }

        return $this->render('newsletterWidget',[
            'newsletter' => $newsletter,
            'categories' => $categories,
        ]);

    }

}
