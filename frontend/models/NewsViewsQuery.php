<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[NewsViews]].
 *
 * @see News_Views
 */
class NewsViewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return News_Views[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return News_Views|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
