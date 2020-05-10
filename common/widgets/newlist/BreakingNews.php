<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
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
        $newlatest = Newlist::find()->with(['newlistsCategory'])->orderBy(['id'=> SORT_DESC])->limit(5)->all();

        return $this->render('breakingNews',[
              'breakingnews' => $newlatest,
        ]);

    }

}
