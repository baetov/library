<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name ФИО
 * @property string $passport Серия и номер паспорта
 * @property string $phone Телефон
 * @property string $book_count с книгами
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_count'],'integer'],
            [['name', 'passport', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'passport' => 'Серия и номер паспорта',
            'phone' => 'Телефон',
        ];
    }
//    public function getOutput()
//    {
//        return $this->hasMany(Output::className(), ['customer_id' => 'id']);
//    }
//
//
//    public function getOutputBooks()
//    {
//        return $this->hasMany(Book::className(), ['id' => 'book_id'])
//            ->via('output');
//    }


    /**
     * {@inheritdoc}
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
