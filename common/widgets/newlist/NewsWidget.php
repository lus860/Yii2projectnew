<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Categor;
use common\models\Newlist;
use yii\bootstrap\Widget;


class NewsWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $newlikes = Newlist::find()->orderBy(['likes_count'=> SORT_DESC])->limit(1)->one();
        $newviwes = Newlist::find()->orderBy(['views_count'=> SORT_DESC])->limit(5)->all();
        $newlatest = Newlist::find()->orderBy(['id'=> SORT_DESC])->limit(4)->all();
        //var_dump($newlikes);die;

        return $this->render('newswidget',[
            'newlikes' =>$newlikes,
            'newviwes' =>$newviwes,
            'newlatests' =>$newlatest,
        ]);

    }


}


