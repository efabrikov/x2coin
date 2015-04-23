<?php

namespace frontend\controllers;

use Yii;
use backend\models\Investment;
use backend\models\search\InvestmentSearch;

class CoinController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $_GET['sort'] = '-id';
        $searchModel  = new InvestmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $cwa = Yii::$app->request->post('cwa');
        if (!empty($cwa)) {
            $swa = $this->_getSwaFromApi($cwa);
            $this->_saveSwaToDb($cwa, $swa);
        }

        return $this->render('index',
                [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,         
        ]);
    }

    private function _getSwaFromApi($cwa)
    {   
        $swa = Yii::$app->blockchain->getNewAddress($cwa);
        //[balance] => [address] => 1CTUApmGd92fQGZKaqxvxvVRKTXW1NYXwr [label] => ssss [total_received] => )

        if (!empty($swa->address)) {
            Yii::$app->getSession()->setFlash('alert',
            [
            'body'    => Yii::t('frontend',
                "Well done! Your personal wallet adress {$swa->address}. Send money from your coin control pannel and we will double them"),
            'options' => ['class' => 'alert-success']
            ]
        );
        }
        else {
            Yii::$app->getSession()->setFlash('alert',
            [
            'body'    => Yii::t('frontend',
                "Service not aviable."),
            'options' => ['class' => 'alert-fail']
            ]
        );
        }

        return $swa;
    }

    private function _saveSwaToDb($cwa, $swa)
    {
        $model = new Investment();
        $model->cwa = $cwa;
        $model->swa = $swa->address;
        $model->save();

        return $model;
    }

    public function actionTest()
    {
        \yii\helpers\VarDumper::dump(Yii::$app->blockchain->getAdresses(),10,1);
        die('test');
    }
}