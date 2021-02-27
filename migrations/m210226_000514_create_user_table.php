<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210226_000514_create_user_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->comment('Email'),
            'name' => $this->string()->comment('Имя'),
            'phone' => $this->string()->comment('Телефон'),
            'position' => $this->string()->comment('Должность'),
            'password_hash' => $this->string()->notNull()->comment('Зашифрованный пароль'),
            'created_at' => $this->dateTime(),
            'is_company_super_admin' => $this->boolean()->comment('Является ли администратором компании'),
            'is_deletable' => $this->boolean()->notNull()->defaultValue(true)->comment('Можно удалить или нельзя'),
        ]);

        $this->insert('user', [
            'email' => 'admin@admin.com',
            'position' => 'administrator',
            'phone' => '123456789',
            'name' => 'administrator',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'is_deletable' => false,
            'is_company_super_admin' => true,
        ]);
        $this->insert('user', [
            'email' => 'mail@mail.com',
            'position' => 'manager',
            'phone' => '123456789',
            'name' => 'Менеджер Игорь',
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'is_deletable' => false,
            'is_company_super_admin' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
