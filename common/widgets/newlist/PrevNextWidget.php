<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;


class PrevNextWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        return $this->render('prevNextWidget',[
            'model' => $this->model,
        ]);

    }

}


