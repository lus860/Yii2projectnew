<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\NewlistsCategory;
use zxbodya\yii2\galleryManager\GalleryBehavior;
use common\models\GalleryImage;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }


    public function getNewlist()
    {
        return $this->hasOne(Newlist::class, ['id' => 'newlists_id'])
            ->via('newlistsCategories');
    }

    public function getNewlistsCategories()
    {
        return $this->hasMany(NewlistsCategory::class, ['categories_id' => 'id']);
    }

//
//    public function getTop()
//    {
//        return $this->hasMany(Newlists::class, ['id' => 'news_id'])
//            ->via('newlistsCategories')
//            ->orderBy(['hits'=>SORT_DESC])->one();
//    }
//
//
//    public function getLimitNewlists()
//    {
//        return $this->hasMany(Newlists::class, ['id' => 'newlists_id'])
//            ->via('newlistsCategories')
//            ->where(['!=','id',$this->getTop()->id]);
//    }

    public function getNewlists()
    {
        return $this->hasOne(Newlist::class, ['id' => 'newlists_id'])
            ->via('newlistsCategories');
    }

    public function getDate($date)
    {
        return Yii::$app->formatter->asDate($date);
    }
}
