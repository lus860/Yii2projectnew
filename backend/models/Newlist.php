<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "newlists".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $video
 * @property int $likes_count
 * @property int|null $views_count
 * @property string $created_at
 */
class Newlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newlists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content', 'img', 'video', 'likes_count'], 'required'],
            [['category_id', 'likes_count', 'views_count'], 'integer'],
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
            'likes_count' => 'Likes Count',
            'views_count' => 'Views Count',
            'created_at' => 'Created At',
        ];
    }
}
