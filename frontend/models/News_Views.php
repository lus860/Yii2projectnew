<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%authors_and_books}}".
 *
 * @property int $id
 * @property int $new_id
 * @property int $view_id
 * @property string|null $created_at
 *

 */
class News_Views extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news_views}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'view_id'], 'required'],
            [['new_id', 'view_id'], 'integer'],
            [['created_at'], 'safe'],

            [['new_id'], 'exist', 'skipOnError' => true, 'targetClass' =>  Newlist::className(), 'targetAttribute' => ['new_id' => 'id']],
            [['view_id'], 'exist', 'skipOnError' => true, 'targetClass' => View::className(), 'targetAttribute' => ['view_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'new_id' => 'New ID',
            'view_id' => 'View ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * {@inheritdoc}
     * @return NewsViewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsViewsQuery(get_called_class());
    }

    public function getNewlist()
    {
        return $this->hasOne(Newlist::className(), ['id' => 'new_id']);
    }


    public function getViews()
    {
        return $this->hasOne(View::className(), ['id' => 'view_id']);
    }
}
