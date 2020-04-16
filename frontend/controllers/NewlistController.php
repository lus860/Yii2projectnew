<?php
namespace frontend\controllers;

use Yii;
use yii\web\Cookie;
use yii\web\Controller;
use common\models\Like;
use yii\data\Pagination;
use yii\web\ErrorAction;
use common\models\Newlist;
use yii\widgets\LinkPager;
use common\models\Category;
use yii\filters\VerbFilter;
use common\models\LikeQuery;
use yii\filters\AccessControl;
use frontend\models\SearchForm;
use yii\data\ActiveDataProvider;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;
use common\widgets\newlist\SearchWidget;
use frontend\controllers\behaviors\AccessBehavior;
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
                'class' =>  AccessBehavior::className(),

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $newlikes = Newlist::NewLikes(3);
        $newviwes = Newlist::NewViwes(3);
        $newtime = Newlist::NewLast(5);
        $newlist = Newlist::find()->with("categories")->all();
        $categorlist = Category::find()->with("newlists")->all();

         return $this->render('index',[
             'newlists' => $newlist,
             'newlikes' => $newlikes,
             'newviwes' => $newviwes,
             'newtimes' => $newtime,
             'categorlists' =>$categorlist,
         ]);
    }


    public function actionGrid($category ='music')
    {
        $model = Category::find()->where(['name' => $category])->with("newlists")->one();
        $news = $model->getNewlist();
        $pages = new Pagination(['totalCount' => $news->count(), 'pageSize' => 12]);
        $new = $news->offset($pages->offset)
           ->limit($pages->limit)
           ->all();
        return $this->render('grid',
            [   'news' => $new,
                'pages' => $pages,
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
        $news = Newlist::find()->with("categories");
        $pages = new Pagination(['totalCount' => $news->count(), 'pageSize' => 8]);
        $models = $news->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('list',[
            'models'=>$models,
            'pages' => $pages,
        ]);

    }


    public function actionContact()
    {
        $newlikes = Newlist::NewLikes(2);
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }
            return $this->render('contact', [
                'model' => $model,
                'newlikeslist'=> $newlikes,

            ]);

    }

    public function actionSingle($id, $category )
    {
        $model = Newlist::find()->where(['id' => $id])->with("categories")->one();
        $model->views_count++;
        $model->save();
        return $this->render('single',[
            'model' => $model,
            'category' => $category,
        ]);
    }


    public function actionVideo($id, $category)
    {
        $model = Newlist::find()->where(['id' => $id])->with("categories")->one();
        $model->views_count++;
        $model->save();
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

    public function actionLike($newid)
    {
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel($newid);
            $is_like = Like::find()->where(['new_id'=>$newid])->andwhere(['user_id'=>Yii::$app->user->identity->id])->one();
            if( $is_like == null ){
                $model->likes_count++;
                $like = new Like();
                $like->new_id = $newid;
                $like->user_id = Yii::$app->user->identity->id;
                if( $like->save() &&  $model->save() ){
                    return true;
                };
            } else {
                $is_like->delete();
                $model->likes_count--;
                if( $model->save() ){
                    return true;
                };

            }
        }
    }

    public function actionSearch($keyword)
    {
            $models = SearchForm::Search($keyword);
            return $this->render('search',
                ['models' => $models,
                'keyword' => $keyword]);

    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionSetFavorite($newid)
    {
        if (!Yii::$app->user->isGuest) {
            $cookies = Yii::$app->request->cookies;
            $cookies->readOnly = false;
            $values = [];

            if (isset($cookies['favorites'])) {
                $arr = $cookies->getValue('favorites');
                foreach ($arr as $value) {
                    $values[] = $value;
                }
            }

            if (in_array($newid, $values)) {
                $searchResult = array_search($newid, $values);
                unset($values[$searchResult]);
            } else {
                $values[] = $newid;
            }

            $cookie = new Cookie([
                'name' => 'favorites',
                'value' => $values,
            ]);

            if (isset($cookies[$cookie->name]) && empty($values)) {
                $cookies->remove($cookie);
            }

            Yii::$app->getResponse()->getCookies()->add($cookie);
            return true;
        }
    }

    public function actionFavorite()
    {
        $cookies = Yii::$app->request->cookies;
        $favorites = $cookies->getValue('favorites');
        return $this->render('favorite',
            ['favorites' => $favorites]);

    }

}
