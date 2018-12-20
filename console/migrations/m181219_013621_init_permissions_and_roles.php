<?php

use yii\db\Migration;

/**
 * Class m181219_013621_init_permissions_and_roles
 */
class m181219_013621_init_permissions_and_roles extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        
        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        
        // Создадим роли админа и редактора новостей
        $admin                  = $auth->createRole('admin');
        $admin->description     = "Администратор";
        $redactor               = $auth->createRole('redactor');
        $redactor->description  = "Редактор";
        
        // запишем их в БД
        $auth->add($admin);
        $auth->add($redactor);
        
        // Создаем разрешения. Например, просмотр админки dashboard и редактирование новости task
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Доступ в админку';
        
        $task = $auth->createPermission('task');
        $task->description = 'Управление заданиями';
        
        // Запишем эти разрешения в БД
        $auth->add($dashboard);
        $auth->add($task);
        
        // Роли «Редактор новостей» присваиваем разрешение «Редактирование новости»
        $auth->addChild($redactor,$dashboard);
        $auth->addChild($redactor,$task);

        $auth->addChild($admin, $redactor);

        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);
        $auth->assign($redactor, 2);
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
