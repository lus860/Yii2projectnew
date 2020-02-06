<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%news_liks}}".
 *
 * @property int $id
 * @property int $new_id
 * @property int $like_id
 * @property string $created_at
 */
class New_Likes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%news_liks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'like_id'], 'required'],
            [['new_id', 'like_id'], 'integer'],
            [['created_at'], 'safe'],
            [['new_id'], 'exist', 'skipOnError' => true, 'targetClass' =>  Newlist::className(), 'targetAttribute' => ['new_id' => 'id']],
            [['like_id'], 'exist', 'skipOnError' => true, 'targetClass' => View::className(), 'targetAttribute' => ['view_id' => 'id']],
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
            'like_id' => 'Like ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NewsLiksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsLiksQuery(get_called_class());
    }

    public function getNewlist()
    {
        return $this->hasOne(Newlist::className(), ['id' => 'new_id']);
    }

    public function getLikes()
    {
        return $this->hasOne(Like::className(), ['id' => 'like_id']);
    }

}
