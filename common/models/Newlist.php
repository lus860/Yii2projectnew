<?php

namespace common\models;

use common\models\Category;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\NewlistsCategory;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use common\models\GalleryImage;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use common\models\Like;
use common\models\LikeQuery;
use common\models\Comment;


/**
 * This is the model class for table "newlists".
 *
 * @property int $id
 * @property string $video
 * @property string $description
 * @property string $video_time
 * @property int|null $likes_count
 * @property int|null $views_count
 * @property int|null $comment_count
 * @property int $created_at
 * @property int $updated_at
 */
class  Newlist  extends \yii\db\ActiveRecord
{

    public $category;
    public $image;
    public static $islike;

    public static function tableName()
    {
        return '{{%newlists}}';
    }
    public function behaviors()
    {
        $path = Yii::getAlias('@frontend') . '/web/images/news/gallery/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        return [

            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],

            ],
            'galleryBehavior' => [
                'class' => GalleryBehavior::class,
                'type' => 'newlist',
                'extension' => 'jpg',
                'directory' => $path,
                'url' => '/images/news/gallery/',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
        ];
    }


    public function rules()
    {
        return [
            [['category','content', 'title','created_at','updated_at','video_time'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['likes_count','views_count', 'comment_count'], 'integer'],
            [['video'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'video' => 'Video',
            'image' => 'Image',
            'likes_count' => 'Likes Count',
            'views_count' => 'Views Count',
            'comment_count' => 'Comment Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category' => 'Category',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NewlistQuery the active query used by this AR class.
     */

    public static function find()
    {
        return new NewlistQuery(get_called_class());
    }


    public function getNext()
    {
        return self::find()->with(['categories'])->where(['id' => $this->id+1])->one();
    }

    public function getPrev()
    {
        return self::find()->with(['categories'])->where(['id'=> $this->id-1])->orderBy('id desc')->one();
    }



    public function getPrevCategory()
    {
        if ( $this->getPrev() ) {
            return $this->prev->categories->name;
        } else {
            return false;
        }
    }

    public function getNextCategory()
    {
        if ( $this->getNext() ) {
            return $this->next->categories->name;
        } else {
            return false;
        }
    }

    public function getCategoryName($param = null)
    {
        if ( $param == 'prev') {
            if ( $this->prev) {
                return $this->prev->categories->name;
            } else {
                return false;
            }
        }
        if ( $param == 'next') {
            if ( $this->next) {
                return $this->next->categories->name;
            } else {
                return false;
            }
        }
        if ( $param == null ) {
            return $this->categories->name;
        }
    }

    public function data()
    {
        $data = ArrayHelper::map( Category::find()->all(),'id','name' );
        return $data;
    }

    public function getPrevTitle()
    {
        if ( $this->getPrev() ) {
            return $this->prev->title;
        }else{
            return false;
        }
    }

    public function getNextTitle()
    {
        if ( $this->getNext()){
            return $this->next->title;
        } else {
            return false;
        }
    }

    public function uploadImage()
    {
        $path = Yii::getAlias('@frontend') . '/web/images/news/';
        if (!is_dir($path)) {
            FileHelper::createDirectory($path);
        }

        $this->image->saveAs(Yii::getAlias($path . $this->id . '.' . $this->image->extension));
    }

    public function deleteImage()
    {
        $img = glob(Yii::getAlias('@frontend') . '/web/images/news/' . $this->id . '.*');

        if ($img) {
            @unlink($img[0]);
        }
    }

    public function getImage()
    {
        return '/frontend/web/images/news/' . $this->id . '.jpg';
    }

    public function getImg($param)
    {
        if(file_exists(Yii::getAlias('@frontend').'/web/images/news/'.$param.'.jpg')) {
            $img = $param.'.jpg';
        } else {
            $img = 'nophoto.png';
        }
        return Html::img(Url::to('/frontend/web/images/news/'.$img), ['style' => 'width:70px;']);

    }


    public function getNewlistsCategory()
    {
        return $this->hasOne(NewlistsCategory::class, ['newlists_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasOne(Category::class, ['id' => 'categories_id'])
            ->via('newlistsCategory');
    }

    public function getShortText($text,$limit=400)
    {
        $text = mb_substr($text, 0, $limit);
        $firsPos = strripos($text, ' ');
        $text = mb_substr($text, 0, $firsPos);
        return $text.'...';

    }

    public static function LikeIdentity()
    {
        $like = Like::find()->select(['new_id','id'])->asArray()->where(['user_id' => Yii::$app->user->identity->id])->all();
        self::$islike = ArrayHelper::map( $like,'id','new_id' );
    }

    public function getLikeIcone($new_id)
    {
        if( self::$islike ){

            return in_array($new_id, self::$islike);
        }
        return false;
    }

    public function getFavoriteIcone($new_id)
    {
        $cookies = Yii::$app->request->cookies;
        $favorites = $cookies->getValue('favorites');
        if( $favorites ) {
            if (in_array($new_id, $favorites)) {
                return false;
            }
        }

         return true;
    }

    public static function NewLikes($limit)
    {

        return self::find()->with(['categories'])->orderBy([ 'likes_count'=> SORT_DESC])->limit($limit)->all();

    }

    public static function NewViwes($limit)
    {

        return self::find()->with(['categories'])->orderBy(['views_count' => SORT_DESC])->limit($limit)->all();

    }

    public static function NewLast($limit)
    {

        return self::find()->with(['categories'])->orderBy([ 'id'=> SORT_DESC])->limit($limit)->all();

    }


    public function getDate($date)
    {

        return Yii::$app->formatter->asDate($date);

    }

}
