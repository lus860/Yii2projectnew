<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;


class NewsWidget extends Widget
{
    public $newlikes;
    public $newviwes;
    public $newlatest;


    public function init()
    {
        parent::init();
    }

    public function run()
    {

        if($this->newlikes == null){
            $this->newlikes = Newlist::NewLikes(1);
        }
        if($this->newviwes == null){
            $this->newviwes = Newlist::NewViwes(5);
        }
        if($this->newlatest == null){
            $this->newlatest = Newlist::NewLast(4);
        }

       return $this->render('newsWidget',[
            'newlikesswidget' => $this->newlikes,
            'newviweswidget' => $this->newviwes,
            'newlatestswidget' => $this->newlatest,
        ]);

    }


}


