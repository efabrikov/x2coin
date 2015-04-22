<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "investment".
 *
 * @property integer $id
 * @property string $cwa
 * @property string $swa
 * @property string $tx_hash
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $pay_at
 * @property integer $status
 * @property string $currency
 * @property double $deposit_amount
 * @property double $pay_amount
 */
class Investment extends \yii\db\ActiveRecord
{
    const STATUS_FAIL = 0;
    const STATUS_ACTIVE = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%investment}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
             TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status','pay_at'], 'integer'],
            [['deposit_amount', 'pay_amount'], 'number'],
            [['cwa', 'swa', 'tx_hash', 'currency'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'cwa' => Yii::t('backend', 'Client wallet address'),
            'swa' => Yii::t('backend', 'Server wallet address'),
            'tx_hash' => Yii::t('backend', 'Transaction hash'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'pay_at' => Yii::t('backend', 'Pay At'),
            'status' => Yii::t('backend', 'Status'),
            'currency' => Yii::t('backend', 'Currency'),
            'deposit_amount' => Yii::t('backend', 'Deposit Amount'),
            'pay_amount' => Yii::t('backend', 'Pay Amount'),
        ];
    }
}
