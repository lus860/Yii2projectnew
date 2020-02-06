<?php

namespace frontend\models;

use Yii;
use frontend\models\Categor;
use frontend\models\Like;
use frontend\models\View;

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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'img' => 'Img',
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

}
