<?php

use yii\db\Migration;
use thamtech\uuid\helpers\UuidHelper;
/**
 * Handles the creation of table `{{%menu}}`.
 */
class m200405_021003_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%mst_menu}}', [
            'id' => $this->string(64)->notNull(),
            'name'=>$this->string()->notNull(),
            'parent'=>$this->string(),
            'order'=>$this->integer(),
            'icon'=>$this->string(),
            'route'=>$this->string(),
            'created_at' => $this->datetime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->datetime()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'PRIMARY KEY(id)'
        ],$tableOptions);
       
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
