<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reception}}`.
 */
class m210227_030637_create_reception_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reception}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->comment('Клиент'),
            'book_id' => $this->integer()->comment('Книга'),
            'created_at' => $this->date()->comment('Дата приема'),
            'user_id' => $this->integer()->comment('Принял'),
            'state' => $this->string()->comment('Состояние')
        ]);
        $this->createIndex(
            'idx-reception-customer_id',
            'reception',
            'customer_id'
        );

        $this->addForeignKey(
            'fk-reception-customer_id',
            'reception',
            'customer_id',
            'customer',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'idx-reception-book_id',
            'reception',
            'book_id'
        );

        $this->addForeignKey(
            'fk-reception-book_id',
            'reception',
            'book_id',
            'book',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'idx-reception-user_id',
            'reception',
            'user_id'
        );

        $this->addForeignKey(
            'fk-reception-user_id',
            'reception',
            'user_id',
            'user',
            'id',
            'SET NULL'
        );
        $this->insert('reception', [
            'customer_id' => 1,
            'book_id' => 2,
            'state' =>'Отличное',
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => 2
        ]);
        $this->insert('reception', [
            'customer_id' => 2,
            'book_id' => 3,
            'state' =>'Отличное',
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => 2
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-reception-user_id',
            'reception'
        );

        $this->dropIndex(
            'idx-reception-user_id',
            'reception'
        );
        $this->dropForeignKey(
            'fk-reception-book_id',
            'reception'
        );

        $this->dropIndex(
            'idx-reception-book_id',
            'reception'
        );
        $this->dropForeignKey(
            'fk-reception-customer_id',
            'reception'
        );

        $this->dropIndex(
            'idx-reception-customer_id',
            'reception'
        );
        $this->dropTable('{{%reception}}');
    }
}
