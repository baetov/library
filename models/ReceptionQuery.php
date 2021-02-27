<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Reception]].
 *
 * @see Reception
 */
class ReceptionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Reception[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Reception|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
