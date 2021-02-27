<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m210226_004815_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название'),
            'code' => $this->string()->comment('Артикул'),
            'created_at' => $this->date()->comment('Дата поступления'),
            'author' => $this->string()->comment('Автор'),
            'status' => $this->integer()->comment('Статус')
        ]);
        $this->insert('book', [
            'name' => 'Вечера на хуторе близ Диканьки',
            'code' => '123456',
            'author' => 'Гоголь Н',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);
        $this->insert('book', [
            'name' => 'Тарас Бульба',
            'code' => '22222',
            'author' => 'Гоголь Н',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 1
        ]);
        $this->insert('book', [
            'name' => 'Бурмистр',
            'code' => '33333',
            'author' => 'Тургенев И.',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 0
        ]);
        $this->insert('book', [
            'name' => 'Певцы',
            'code' => '22222',
            'author' => 'Тургенев И.',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 0
        ]);
        $this->insert('book', [
            'name' => 'Хаджи-Мурат',
            'code' => '33444',
            'author' => 'Толстой Л',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 0
        ]);
        $this->insert('book', [
            'name' => 'Капитанская дочка',
            'code' => '4444',
            'author' => 'Пушкин А.',
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 0
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
