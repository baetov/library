<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m210226_004610_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('ФИО'),
            'passport' => $this->string()->comment('Серия и номер паспорта'),
            'phone' => $this->string()->comment('Телефон'),
            'book_count' => $this->integer()
        ]);
        $this->insert('customer', [
            'name' => 'Алексей',
            'passport' => '123456',
            'phone' => '123456',
            'book_count' => 0
        ]);
        $this->insert('customer', [
            'name' => 'Владимир',
            'passport' => '123456',
            'phone' => '123456',
            'book_count' => 0
        ]);
        $this->insert('customer', [
            'name' => 'Сергей',
            'passport' => '123456',
            'phone' => '123456',
            'book_count' => 2
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}
