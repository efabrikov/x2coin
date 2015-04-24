<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use backend\models\Investment;

class InvestmentController extends Controller
{

    public function actionLoad()
    {
        Console::output('Loading ...');

        $this->processBlockchain();
        //$this->processDogecoin();

        Console::output('Success! Investments has been added.');
    }

    protected function getModel($cwa, $swa, $currency)
    {
        if (($model = Investment::findOne(['swa' => $swa])) !== null) {
            return $model;
        } else {
            $model           = new Investment();
            $model->cwa      = $cwa;
            $model->swa      = $swa;
            $model->currency = $currency;
            $model->pay_at = Yii::$app->getFormatter()->asTimestamp(time()) + Yii::$app->params['bitcoinDefaultDelayTime'];
        }

        return $model;
    }

    protected function processBlockchain()
    {
        $adresses = Yii::$app->blockchain->getAddresses();

        Console::output('Blockchain api return ' . count($adresses) . ' adresses');

        foreach ($adresses as $wallet) {
            $model = $this->getModel($wallet->label, $wallet->address, 'bitcoin');
            if (!$this->updateModelBlockchain($wallet, $model)) {
                Yii::warning('wallet not updated: ' . $wallet->address, 'console');
            }
        }

        return true;
    }

    protected function updateModelBlockchain($wallet, $model)
    {
        $model->deposit_amount =  $wallet->balance;
        $model->pay_amount =  $wallet->balance * Yii::$app->params['bitcoinDefaultRate'];        

        return $model->save();
    }
}