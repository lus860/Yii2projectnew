<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Categor;


/**
 * This is the model class for table "{{%news}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $video
 * @property string $created_at
 */
class  Newlist  extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%newlists}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content', 'img'], 'required'],
            [['category_id'], 'integer'],
            [['title', 'content'], 'string'],
            [['created_at'], 'safe'],
            [['img', 'video'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'title' => 'Title',
            'content' => 'Content',
            'img' => 'Image',
            'video' => 'Video',
            'created_at' => 'Created At',
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

    public function getCategory()
    {
    return $this->hasOne(Categor::className(), ['id' => 'category_id']);
    }

    public function getNewLikes()
    {
        return $this->hasMany(News_Liks::className(), ['new_id' => 'id']);
    }

    public function getNewViews()
    {
        return $this->hasMany(News_Views::className(), ['new_id' => 'id']);
    }

    public function getViews()
    {
        return $this->hasMany(View::className(), ['id' => 'view_id'])->via('newViews');
    }

    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['id' => 'like_id'])->via('newLikes');
    }

    public function getNext() {
        $next = $this->find()->where(['>', 'id', $this->id])->one();
        return $next;
    }

    public function getPrev() {
        $prev = $this->find()->where(['<', 'id', $this->id])->orderBy('id desc')->one();
        return $prev;
    }



    public function getPrevCategory() {
        if ( $this->getPrev() ) {
           $prevcategory = $this->getPrev()->getCategory()->one()->name;
           return $prevcategory;
        } else {
            return false;
        }
    }

    public function getNextCategory() {
        if ( $this->getNext() ) {
            $nextcategory = $this->getNext()->getCategory()->one()->name;
            return $nextcategory;
        } else {
            return false;
        }
    }

    public function getCategoryName($param = null) {
        if ( $param == 'prev') {
            if ( $this->getPrev() ) {
                $prevcategory = $this->getPrev()->getCategory()->one()->name;
                return $prevcategory;
            } else {
                return false;
            }
        }
        if ( $param == 'next') {
            if ( $this->getNext()) {
               $nextcategory = $this->getNext()->getCategory()->one()->name;
               return $nextcategory;
            } else {
                return false;
            }
        }
        if ( $param == null ) {
            $categoryname = $this->getCategory()->one()->name;
            return $categoryname;
        }
    }

    public function data()
    {
        $data=ArrayHelper::map( Categor::find()->all(),'id','name' );
        return $data;
    }

    public function getPrevTitle() {
        if ( $this->getPrev() ) {
           $prevtitle= $this->getPrev()->title;
           return $prevtitle;
        }else{
            return false;
        }
    }

    public function getNextTitle() {
        if ( $this->getNext()){
           $nexttitle= $this->getNext()->title;
           return $nexttitle;
        } else {
            return false;
        }
    }
}
