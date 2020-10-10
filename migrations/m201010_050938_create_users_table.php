<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%groups}}`
 */
class m201010_050938_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'name' => $this->string(),
            'register_date' => $this->dateTime(),
            'group_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-users-group_id}}',
            '{{%users}}',
            'group_id'
        );

        // add foreign key for table `{{%groups}}`
        $this->addForeignKey(
            '{{%fk-users-group_id}}',
            '{{%users}}',
            'group_id',
            '{{%groups}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%groups}}`
        $this->dropForeignKey(
            '{{%fk-users-group_id}}',
            '{{%users}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-users-group_id}}',
            '{{%users}}'
        );

        $this->dropTable('{{%users}}');
    }
}
