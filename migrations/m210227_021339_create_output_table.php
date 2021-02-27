<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%output}}`.
 */
class m210227_021339_create_output_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%output}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->comment('Клиент'),
            'book_id' => $this->integer()->comment('Книга'),
            'issue_date' => $this->date()->comment('Срок выдачи'),
            'created_at' => $this->date()->comment('Дата выдачи'),
            'user_id' => $this->integer()->comment('Выдал')
        ]);
        $this->createIndex(
            'idx-output-customer_id',
            'output',
            'customer_id'
        );

        $this->addForeignKey(
            'fk-output-customer_id',
            'output',
            'customer_id',
            'customer',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'idx-output-book_id',
            'output',
            'book_id'
        );

        $this->addForeignKey(
            'fk-output-book_id',
            'output',
            'book_id',
            'book',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'idx-output-user_id',
            'output',
            'user_id'
        );

        $this->addForeignKey(
            'fk-output-user_id',
            'output',
            'user_id',
            'user',
            'id',
            'SET NULL'
        );
        $this->insert('output', [
            'customer_id' => 1,
            'book_id' => 2,
            'issue_date' =>date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => 2
        ]);
        $this->insert('output', [
            'customer_id' => 2,
            'book_id' => 3,
            'issue_date' =>date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => 2
        ]);
        $this->insert('output', [
            'customer_id' => 3,
            'book_id' => 1,
            'issue_date' =>date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => 2
        ]);
        $this->insert('output', [
            'customer_id' => 3,
            'book_id' => 2,
            'issue_date' =>date('Y-m-d H:i:s'),
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
            'fk-output-user_id',
            'output'
        );

        $this->dropIndex(
            'idx-output-user_id',
            'output'
        );
        $this->dropForeignKey(
            'fk-output-book_id',
            'output'
        );

        $this->dropIndex(
            'idx-output-book_id',
            'output'
        );
        $this->dropForeignKey(
            'fk-output-customer_id',
            'output'
        );

        $this->dropIndex(
            'idx-output-customer_id',
            'output'
        );

        $this->dropTable('{{%output}}');
    }
}
