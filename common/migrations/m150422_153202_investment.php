<?php

use yii\db\Schema;
use yii\db\Migration;

class m150422_153202_investment extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%investment}}',
            [
            'id'             => Schema::TYPE_PK,
            'cwa'            => Schema::TYPE_STRING . '(50) NOT NULL DEFAULT \'0\' COMMENT \'client wallet address\'',
            'swa'            => Schema::TYPE_STRING . '(50) NOT NULL DEFAULT \'0\' COMMENT \'server wallet address\'',
            'tx_hash'        => Schema::TYPE_STRING . '(50) NOT NULL DEFAULT \'0\' COMMENT \'transaction hash\'',
            'created_at'     => Schema::TYPE_INTEGER,
            'updated_at'     => Schema::TYPE_INTEGER,
            'pay_at'         => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL COMMENT \'when pay to client\'',
            'status'         => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT ' . \backend\models\Investment::STATUS_ACTIVE,
            'currency'       => Schema::TYPE_STRING . '(50) NOT NULL DEFAULT \'0\'',
            'deposit_amount' => Schema::TYPE_FLOAT . '(50) NOT NULL DEFAULT \'0\'',
            'pay_amount'     => Schema::TYPE_FLOAT . '(50) NOT NULL DEFAULT \'0\'',
            ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%investment}}');

        return false;
    }
}