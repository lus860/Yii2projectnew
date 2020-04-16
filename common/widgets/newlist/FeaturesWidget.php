<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;


class FeaturesWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $category = Category::find()->with("newlists")->all();

        return $this->render('featuresWidget',[
            'category' => $category,
        ]);

    }

}
