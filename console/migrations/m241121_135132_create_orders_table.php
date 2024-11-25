<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m241121_135132_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'total_price' => $this->decimal(10,2)->notNull(),
            'status' => $this->tinyInteger(1)->notNull(),
            'firstname' => $this->string(45)->notNull(),
            'lastname' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull(),
            'transaction_id' => $this->string(255),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );

        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
