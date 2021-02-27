<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Output]].
 *
 * @see Output
 */
class OutputQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Output[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Output|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
