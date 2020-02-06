<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Newlists]].
 *
 * @see Newlists
 */
class NewlistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Newlists[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Newlists|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
