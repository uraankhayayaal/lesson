<?php

use yii\db\Migration;

/**
 * Class m181220_021141_lesson_task_summary
 */
class m181220_021141_lesson_task_summary extends Migration
{
    public function safeUp()
    {
        $this->addColumn('task', 'user_id', $this->integer());
        
        $this->addForeignKey('fk-task-user_id-user-id','task','user_id','user','id','SET NULL','SET NULL');
        $this->createIndex('idx-task-user_id-user-id','task','user_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-task-user_id-user-id','task');
        $this->dropIndex('idx-task-user_id-user-id','task');

        $this->dropColumn('task', 'user_id');
    }
}
