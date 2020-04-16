<?php

namespace backend\controllers;

use Yii;
use common\models\Newlist;
use common\models\Category;
use common\models\NewlistsCategory;
use common\models\GalleryImage;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\NewsletteresForm;
use common\models\Newsletteres;
use zxbodya\yii2\galleryManager\GalleryManagerAction;
use zxbodya\yii2\galleryManager\GalleryManager;
use backend\controllers\behaviors\AccessBehavior;


        class NewlistController extends Controller
        {
            public function behaviors()
            {
                return [
                    AccessBehavior::className(),
                ];
            }

            public function actions()
            {
                return [
                    'galleryApi' => [
                        'class' => GalleryManagerAction::class,
// mappings between type names and model classes (should be the same as in behaviour)
                        'types' => [
                            'newlist' => Newlist::class,
                        ]
                    ],
                    'error' => [
                        'class' => 'yii\web\ErrorAction',
                    ],

                ];
            }


            /**
             * Lists all Newlist models.
             * @return mixed
             */
            public function actionIndex()
            {
                $dataProvider = new ActiveDataProvider([
                    'query' => Newlist::find()->with("categories"),
                ]);

                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            }

            /**
             * Displays a single Newlist model.
             * @param integer $id
             * @return mixed
             * @throws NotFoundHttpException if the model cannot be found
             */
            public function actionView($id)
            {
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
            }

            /**
             * Creates a new Newlist model.
             * If creation is successful, the browser will be redirected to the 'view' page.
             * @return mixed
             */
            public function actionCreate()
            {
                $model = new Newlist();
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if ($model->image) {
                        $model->uploadImage($model->id);
                    }
                    NewsletteresForm::Subscribe($model->categories->id);
                    return $this->redirect(['view', 'id' => $model->id]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }


            public function actionUpdate($id)
            {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if ($model->image) {
                        $model->deleteImage();
                        $model->uploadImage();
                    }
                    NewsletteresForm::Subscribe($model->categories->id);

                    return $this->redirect(['view', 'id' => $model->id]);
                }

                return $this->render('update', [
                    'model' => $model,
                ]);
            }

            public function actionDelete($id)
            {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            }

            protected function findModel($id)
            {
                if (($model = Newlist::findOne($id)) !== null) {
                    return $model;
                }

                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
