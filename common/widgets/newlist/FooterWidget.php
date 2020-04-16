<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;


class FooterWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $count = Category::find()->count();
        $category = Category::findOne(rand(1,$count));
        $newlist = $category->getNewlists()->with("categories")->limit(2)->all();
        return $this->render('footerWidget',[
            'footerwidget' => $newlist,
            'namewidget' => $category->name,
        ]);

    }

}
