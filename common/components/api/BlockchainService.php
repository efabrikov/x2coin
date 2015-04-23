<?php

namespace common\components\api;

use \Yii;
use yii\base\Object;

class BlockchainService extends Object
{
    /**
     *
     * @var \Blockchain\Blockchain
     */
    private $_blockchain;


    public $id;
    public $password;

    public function init()
    {
        parent::init();
        Yii::trace('init');
        $this->_blockchain = Yii::createObject(['class'=> '\Blockchain\Blockchain']);

        $this->_blockchain->Wallet->credentials(
            Yii::$app->params['blockchainId'],
            Yii::$app->params['blockchainPassword']
            );
    }

    public function getAdresses()
    {
        return $this->_blockchain->Wallet->getAddresses();
    }

    public function getNewAddress($label =  '')
    {
         return $this->_blockchain->Wallet->getNewAddress($label);
    }

    public function getAddress($addr)
    {
        //$address = '1K1jYPfk6QihBCg7p4nAX5NSNtiUTpKzWo';
        //$address = '1DgxiXnGRubcpDPT5kpEhA1bX3QAY3v7s8';
        //$address = '16M3dNecXzRCrVqkXt4DyzPWBhNLMHA2zz';

        $limit = 50;
        $offset = 0;
        return $this->_blockchain
            ->Explorer->getAddress($addr, $limit, $offset);
    }

}