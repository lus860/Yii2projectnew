<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 */
class Categor extends \yii\db\ActiveRecord
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

    /**
     * {@inheritdoc}
     * @return CategorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategorQuery(get_called_class());
    }

}
