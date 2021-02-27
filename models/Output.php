<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "output".
 *
 * @property int $id
 * @property int $customer_id Клиент
 * @property int $book_id Книга
 * @property string $issue_date Срок выдачи
 * @property string $created_at Дата выдачи
 * @property int $user_id Выдал
 *
 * @property Book $book
 * @property Customer $customer
 * @property User $user
 */
class Output extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'output';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => null,
                'createdAtAttribute' => 'created_at',
                'value' => date('Y-m-d H:i:s'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'updatedByAttribute' => null,
                'createdByAttribute' => 'user_id',
                'value' => Yii::$app->user->id
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'book_id', 'user_id'], 'default', 'value' => null],
            [['customer_id', 'book_id', 'user_id'], 'integer'],
            [['issue_date', 'created_at'], 'safe'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
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
            'customer_id' => 'Клиент',
            'book_id' => 'Книга',
            'issue_date' => 'Срок выдачи до',
            'created_at' => 'Дата выдачи ',
            'user_id' => 'Выдал',
        ];
    }
    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $book = Book::find()->where(['id' => $this->book_id])->one();
            $book->status = 1;
            $book->save();
            $customer = Customer::find()->where(['id' => $this->customer_id])->one();
            $customer->book_count += 1;
            $customer->save();

        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return OutputQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OutputQuery(get_called_class());
    }
}