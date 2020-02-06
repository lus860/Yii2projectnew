<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[NewsLiks]].
 *
 * @see NewsLiks
 */
class NewsLiksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return News_Liks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return News_Liks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
