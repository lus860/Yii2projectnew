<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Categor;
use common\models\Newlist;
use yii\bootstrap\Widget;


class BreakingNews extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $newlatest = Newlist::find()->orderBy(['id'=> SORT_DESC])->limit(5)->all();
        //var_dump($newlikes);die;

        return $this->render('breakingnews',[
              'newlatests' =>$newlatest,
        ]);

    }

}
