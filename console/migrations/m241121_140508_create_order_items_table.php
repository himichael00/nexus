<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m241121_140508_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(255)->notNull(),
            'product_id' => $this->integer(11)->notNull(),
            'unit_price' => $this->decimal(10,2)->notNull(),
            'order_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(2)->notNull(),
        ]);

        // indexing column product_id
        $this->createIndex(
            '{{%idx-order_items-product_id}}',
            '{{%order_items}}',
            'product_id'
        );

        // foreign key table order_items column product_id to table products column id
        $this->addForeignKey(
            '{{%fk-order_items-product_id}}',
            '{{%order_items}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );

        // indexing column order_id
        $this->createIndex(
            '{{%idx-order_items-order_id}}',
            '{{%order_items}}',
            'order_id'
        );

        // foreign key table order_items column order_id to table orders column id
        $this->addForeignKey(
            '{{%fk-order_items-order_id}}',
            '{{%order_items}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_items}}');
    }
}
