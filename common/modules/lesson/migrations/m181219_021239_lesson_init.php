<?php

use yii\db\Migration;

/**
 * Class m181219_021239_lesson_init
 */
class m181219_021239_lesson_init extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'src' => $this->text()->notNull(),
            'description' => $this->text(),
            'summary' => $this->string(),

            'is_publish' => $this->boolean(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - установка фреймворка',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jrer19KiDQg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы начинаем новый курс уроки Angular 7 и в этом видео я покажу как установить фреймворк Angular и начать с ним работу. Так же расскажу Angular что это за зверь такой, которого все боятся. Курс нацелен angular для начинающих, каждый сможет разобраться с основами фреймворка. Установка фреймворка не занимает много времени и я покажу настройку первого проекта Angular для новичков. Angular интересный фреймворк javascript, который позволяет делать spa приложения намного быстрее и писать меньше кода.',
            'summary' => '/images/task/pdf-sample.pdf',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Компоненты',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FhKW6wLlPaE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular и в этом видео мы рассмотрим компоненты фреймворка. Как работать с компонентами Angular, как создавать компоненты с помощью Angular CLi, насколько просто это изучение angular. На самом деле Angular уроки покажут вам насколько это простой фреймворк, а не такой сложный каким может казаться начинающим на первый взгляд.',
            'summary' => '/images/task/pdf-test.pdf',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - привязка данных практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/ezzKFsTv4qI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular 6 уроки и в этом видео мы поговорим про привязку данных и у нас уже будет первая практика angular. Ангуляр не сложный фреймворк, главное это понять его концепцию. В данном уроке Angular 6 мы разберем что такое интерполяция и на практике по работаем с переменными.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngFor практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HD-6QsvpfeM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular 7 javascript фреймворк. Angular 6 для начинающих кажется очень непростой задачей для изучения, но с помощью данных Angular уроков я покажу вам обратное. На самом деле Angular прост в использовании и исполнении javascript задач. В данном видео мы разберем директиву ngFor на практике с примерами.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngif',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/QuogUH8Vuw8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем серию уроков по Angular 7 и в данном видео мы рассмотрим директиву ngif. Angular уроки построены таким образом что б было максимально практических заданий и их решений. Курс по angular у меня на канале максимально полезен для начинающих в javascript фреймворках.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Click. Отслеживание событий',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/nC_flGQ9waE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс Angular уроков для начинающих. В этом видео мы на практике рассмотрим событие javascript Click, как оно применяется в фреймворке Angular. Это может быть щелчек мыши, наведение на какую то область или нажатие на клавиатуру, вообще все те же события javascript вы так же можете использовать для вызова компонентной логики в Angular приложении. Это связано с angular event binding.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngModel. Двусторонняя привязка данных',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/eCwSJ5PzjJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular уроки и в данном видео мы рассмотрим как работает ngModel. А соответственно полностью разберем что такое двусторонняя привязка данных с примерами на практике. Angular имеет возможность двусторонней привязке данных благодаря основной директиве ngModel, но для ее работы с формами надо импортировать модуль FormsModule, все это показано в уроке angular.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - установка фреймворка',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jrer19KiDQg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы начинаем новый курс уроки Angular 7 и в этом видео я покажу как установить фреймворк Angular и начать с ним работу. Так же расскажу Angular что это за зверь такой, которого все боятся. Курс нацелен angular для начинающих, каждый сможет разобраться с основами фреймворка. Установка фреймворка не занимает много времени и я покажу настройку первого проекта Angular для новичков. Angular интересный фреймворк javascript, который позволяет делать spa приложения намного быстрее и писать меньше кода.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Компоненты',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FhKW6wLlPaE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular и в этом видео мы рассмотрим компоненты фреймворка. Как работать с компонентами Angular, как создавать компоненты с помощью Angular CLi, насколько просто это изучение angular. На самом деле Angular уроки покажут вам насколько это простой фреймворк, а не такой сложный каким может казаться начинающим на первый взгляд.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - привязка данных практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/ezzKFsTv4qI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular 6 уроки и в этом видео мы поговорим про привязку данных и у нас уже будет первая практика angular. Ангуляр не сложный фреймворк, главное это понять его концепцию. В данном уроке Angular 6 мы разберем что такое интерполяция и на практике по работаем с переменными.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngFor практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HD-6QsvpfeM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular 7 javascript фреймворк. Angular 6 для начинающих кажется очень непростой задачей для изучения, но с помощью данных Angular уроков я покажу вам обратное. На самом деле Angular прост в использовании и исполнении javascript задач. В данном видео мы разберем директиву ngFor на практике с примерами.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngif',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/QuogUH8Vuw8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем серию уроков по Angular 7 и в данном видео мы рассмотрим директиву ngif. Angular уроки построены таким образом что б было максимально практических заданий и их решений. Курс по angular у меня на канале максимально полезен для начинающих в javascript фреймворках.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Click. Отслеживание событий',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/nC_flGQ9waE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс Angular уроков для начинающих. В этом видео мы на практике рассмотрим событие javascript Click, как оно применяется в фреймворке Angular. Это может быть щелчек мыши, наведение на какую то область или нажатие на клавиатуру, вообще все те же события javascript вы так же можете использовать для вызова компонентной логики в Angular приложении. Это связано с angular event binding.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngModel. Двусторонняя привязка данных',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/eCwSJ5PzjJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular уроки и в данном видео мы рассмотрим как работает ngModel. А соответственно полностью разберем что такое двусторонняя привязка данных с примерами на практике. Angular имеет возможность двусторонней привязке данных благодаря основной директиве ngModel, но для ее работы с формами надо импортировать модуль FormsModule, все это показано в уроке angular.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - установка фреймворка',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jrer19KiDQg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы начинаем новый курс уроки Angular 7 и в этом видео я покажу как установить фреймворк Angular и начать с ним работу. Так же расскажу Angular что это за зверь такой, которого все боятся. Курс нацелен angular для начинающих, каждый сможет разобраться с основами фреймворка. Установка фреймворка не занимает много времени и я покажу настройку первого проекта Angular для новичков. Angular интересный фреймворк javascript, который позволяет делать spa приложения намного быстрее и писать меньше кода.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Компоненты',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FhKW6wLlPaE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular и в этом видео мы рассмотрим компоненты фреймворка. Как работать с компонентами Angular, как создавать компоненты с помощью Angular CLi, насколько просто это изучение angular. На самом деле Angular уроки покажут вам насколько это простой фреймворк, а не такой сложный каким может казаться начинающим на первый взгляд.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - привязка данных практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/ezzKFsTv4qI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular 6 уроки и в этом видео мы поговорим про привязку данных и у нас уже будет первая практика angular. Ангуляр не сложный фреймворк, главное это понять его концепцию. В данном уроке Angular 6 мы разберем что такое интерполяция и на практике по работаем с переменными.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngFor практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HD-6QsvpfeM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular 7 javascript фреймворк. Angular 6 для начинающих кажется очень непростой задачей для изучения, но с помощью данных Angular уроков я покажу вам обратное. На самом деле Angular прост в использовании и исполнении javascript задач. В данном видео мы разберем директиву ngFor на практике с примерами.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngif',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/QuogUH8Vuw8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем серию уроков по Angular 7 и в данном видео мы рассмотрим директиву ngif. Angular уроки построены таким образом что б было максимально практических заданий и их решений. Курс по angular у меня на канале максимально полезен для начинающих в javascript фреймворках.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Click. Отслеживание событий',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/nC_flGQ9waE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс Angular уроков для начинающих. В этом видео мы на практике рассмотрим событие javascript Click, как оно применяется в фреймворке Angular. Это может быть щелчек мыши, наведение на какую то область или нажатие на клавиатуру, вообще все те же события javascript вы так же можете использовать для вызова компонентной логики в Angular приложении. Это связано с angular event binding.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngModel. Двусторонняя привязка данных',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/eCwSJ5PzjJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular уроки и в данном видео мы рассмотрим как работает ngModel. А соответственно полностью разберем что такое двусторонняя привязка данных с примерами на практике. Angular имеет возможность двусторонней привязке данных благодаря основной директиве ngModel, но для ее работы с формами надо импортировать модуль FormsModule, все это показано в уроке angular.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - установка фреймворка',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Jrer19KiDQg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы начинаем новый курс уроки Angular 7 и в этом видео я покажу как установить фреймворк Angular и начать с ним работу. Так же расскажу Angular что это за зверь такой, которого все боятся. Курс нацелен angular для начинающих, каждый сможет разобраться с основами фреймворка. Установка фреймворка не занимает много времени и я покажу настройку первого проекта Angular для новичков. Angular интересный фреймворк javascript, который позволяет делать spa приложения намного быстрее и писать меньше кода.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Компоненты',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/FhKW6wLlPaE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular и в этом видео мы рассмотрим компоненты фреймворка. Как работать с компонентами Angular, как создавать компоненты с помощью Angular CLi, насколько просто это изучение angular. На самом деле Angular уроки покажут вам насколько это простой фреймворк, а не такой сложный каким может казаться начинающим на первый взгляд.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - привязка данных практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/ezzKFsTv4qI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular 6 уроки и в этом видео мы поговорим про привязку данных и у нас уже будет первая практика angular. Ангуляр не сложный фреймворк, главное это понять его концепцию. В данном уроке Angular 6 мы разберем что такое интерполяция и на практике по работаем с переменными.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngFor практика',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/HD-6QsvpfeM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Продолжаем курс уроки Angular 7 javascript фреймворк. Angular 6 для начинающих кажется очень непростой задачей для изучения, но с помощью данных Angular уроков я покажу вам обратное. На самом деле Angular прост в использовании и исполнении javascript задач. В данном видео мы разберем директиву ngFor на практике с примерами.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngif',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/QuogUH8Vuw8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем серию уроков по Angular 7 и в данном видео мы рассмотрим директиву ngif. Angular уроки построены таким образом что б было максимально практических заданий и их решений. Курс по angular у меня на канале максимально полезен для начинающих в javascript фреймворках.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - Click. Отслеживание событий',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/nC_flGQ9waE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс Angular уроков для начинающих. В этом видео мы на практике рассмотрим событие javascript Click, как оно применяется в фреймворке Angular. Это может быть щелчек мыши, наведение на какую то область или нажатие на клавиатуру, вообще все те же события javascript вы так же можете использовать для вызова компонентной логики в Angular приложении. Это связано с angular event binding.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('{{%task}}', [
            'title' => 'Уроки Angular 7 - ngModel. Двусторонняя привязка данных',
            'src' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/eCwSJ5PzjJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'description' => 'Мы продолжаем курс angular уроки и в данном видео мы рассмотрим как работает ngModel. А соответственно полностью разберем что такое двусторонняя привязка данных с примерами на практике. Angular имеет возможность двусторонней привязке данных благодаря основной директиве ngModel, но для ее работы с формами надо импортировать модуль FormsModule, все это показано в уроке angular.',
            'is_publish' => true,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
