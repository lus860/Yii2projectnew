<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%views}}".
 *
 * @property int $id
 * @property int $new_id
 * @property int $user_id
 */
class View extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%views}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['new_id', 'user_id'], 'required'],
            [['new_id', 'user_id'], 'integer'],
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
            'user_id' => 'User ID',
        ];
    }


    /**
     * {@inheritdoc}
     * @return ViewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViewsQuery(get_called_class());
    }
}
