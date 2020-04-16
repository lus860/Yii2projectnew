<?php

namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;
use frontend\models\SearchForm;

class SearchWidget extends Widget
{
    public $url;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $modelkeyword = new SearchForm();

        if ($modelkeyword->load(Yii::$app->request->post())) {
              //var_dump($model);die;
             Yii::$app->controller->redirect(['/newlist/search', 'keyword' => $modelkeyword->keyword]);
            return ;
            // return Yii::$app->controller->redirect([Yii::getAlias('@frontend').'/newlist/search']);
        }
        return $this->render('searchWidget',[
            'modelkeyword' => $modelkeyword,
        ]);

    }

}