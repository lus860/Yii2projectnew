<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Newlist;
use common\models\Categor;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewController implements the CRUD actions for New model.
 */
class NewlistController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all New models.
     * @return mixed
     */
    public function actionIndex()
    {   // $string = Yii::$app->security->generatePasswordHash(3354457777);
         //var_dump($string);die;

         $newlist = Newlist::find()->all();
         $newlikes = Newlist::find()->orderBy([ 'likes_count'=> SORT_DESC])->limit(3)->all();
         $newviwes = Newlist::find()->orderBy(['views_count' => SORT_DESC])->limit(3)->all();
         $newtime = Newlist::find()->orderBy([ 'id'=> SORT_DESC])->limit(5)->all();
         //var_dump($newlikes);die;
         $categorlist = Categor::find()->all();

         return $this->render('index',[
             'newlists' =>$newlist,
             'newlikes' =>$newlikes,
             'newviwes' =>$newviwes,
             'newtimes' =>$newtime,
             'categorlists' =>$categorlist,
         ]);
    }


    public function actionGrid($category ='music')
    {
        $model = Categor::find()->where(['name' => $category])->one();
        $new=$model->getNewlist()->all();
       //var_dump($new[0]->img);die;
        return $this->render('grid',
            ['news' => $new,
                'category' => $category,
            ]);
    }

    /**
     * Creates a new New model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionList()
    {
        $models = Newlist::find()->all();
        return $this->render('list',[
            'models'=>$models,
        ]);
    }


    public function actionContact()
    {
        $newlikes = Newlist::find()->orderBy([ 'likes_count'=> SORT_DESC])->limit(1)->one();
        return $this->render('contact',[
            'newlikes'=> $newlikes,
        ]);
    }


    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionSingle($id, $category )
    {
        $model = Newlist::find()->where(['id' => $id])->one();
        ///var_dump( $model->getPrevCategory());die;
        return $this->render('single',[
            'model' => $model,
            'category' => $category,
        ]);
    }

    public function actionTypography()
    {
        return $this->render('typography');
    }

    public function actionVideo($id, $category)
    {
        $model = Newlist::find()->where(['id' => $id])->one();
        //var_dump($model->video);die;
        return $this->render('video',[
            'model' => $model,
            'category' => $category,
        ]);

    }

    protected function findModel($id)
    {
        if (($model = Newlist::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
