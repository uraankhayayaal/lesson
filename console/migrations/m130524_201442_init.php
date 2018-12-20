<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%auth}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk-auth-user_id-user-id','auth','user_id','user','id','CASCADE','CASCADE');
        $this->createIndex('idx-auth-user_id-user-id','auth','user_id');

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => 'some string',
            'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('admin'),
            'email' => 'uraankhayayaal@gmail.com',
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%user}}', [
            'username' => 'redactor',
            'auth_key' => 'some string',
            'password_hash' => \Yii::$app->getSecurity()->generatePasswordHash('redactor'),
            'email' => 'ayaal.kaplin@mail.ru',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down()
    {
        $this->dropForeignKey('fk-auth-user_id-user-id','auth');
        $this->dropIndex('idx-auth-user_id-user-id','auth');

        $this->dropTable('{{%auth}}');
        
        $this->dropTable('{{%user}}');
    }
}
