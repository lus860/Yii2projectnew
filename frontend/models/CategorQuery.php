<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Categories]].
 *
 * @see Categories
 */
class CategorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Categor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Categor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
