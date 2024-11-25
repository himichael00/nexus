<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_items}}`.
 */
class m241125_140509_create_cart_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_items}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(2)->notNull(),
            'created_by' => $this->integer(11)
        ]);

        // indexing column product_id
        $this->createIndex(
            '{{%idx-cart_items-product_id}}',
            '{{%cart_items}}',
            'product_id'
        );

        // foreign key table cart_items column product_id to table products column id
        $this->addForeignKey(
            '{{%fk-cart_items-product_id}}',
            '{{%cart_items}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            '{{%idx-cart_items-created_by}}',
            '{{%cart_items}}',
            'created_by'
        );

        $this->addForeignKey(
            '{{%fk-cart_items-created_by}}',
            '{{%cart_items}}',
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
        $this->dropTable('{{%cart_items}}');
    }
}
