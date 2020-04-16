<?php
namespace common\widgets\newlist;

use Yii;
use common\models\Category;
use common\models\Newlist;
use yii\bootstrap\Widget;
use common\models\Comment;
use common\models\CommentForm;


class CommentWidget extends Widget
{
    public $new_id;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $comments = Comment::find()->where(['and', ['new_id' => $this->new_id], ['parent_id' => null], ['status' => Comment::STATUS_ALLOW]])->orderBy('id desc')->all();
        $commentForm = new CommentForm();
        if(Yii::$app->request->isPost)
        {
            $commentForm->load(Yii::$app->request->post());
            if($commentForm->saveComment($this->new_id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                 Yii::$app->controller->refresh();
                return;
            }
        }

        return $this->render('commentWidget',[
            'comments' => $comments,
            'commentForm' => $commentForm,
        ]);

    }

}
