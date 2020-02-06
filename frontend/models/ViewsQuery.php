<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Views]].
 *
 * @see View
 */
class ViewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return View[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return View|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
