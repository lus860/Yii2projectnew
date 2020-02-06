<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%likes}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $new_id
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%likes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'new_id'], 'required'],
            [['user_id', 'new_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'new_id' => 'New ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return LikeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LikeQuery(get_called_class());
    }
}
