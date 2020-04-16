<?php

namespace common\models;

use Yii;
use common\models\LikeQuery;
use common\models\User;
use common\models\Newlist;

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
            [['user_id', 'new_id'], 'integer'],
            [['new_id'], 'exist', 'skipOnError' => true, 'targetClass' => Newlist::className(), 'targetAttribute' => ['new_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
