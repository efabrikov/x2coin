<?php

namespace frontend\controllers;

use Yii;
use backend\models\Investment;
use backend\models\search\InvestmentSearch;

class CoinController extends \yii\web\Controller
{

    public function actionIndex()
    {        
        //process bitcoin
        $cwa = Yii::$app->request->post('cwa_bitcoin');
        if (!empty($cwa)) {            
            $this->processBitcoin($cwa);
        }

        //process dogecoin
        $cwa = Yii::$app->request->post('cwa_dogecoin');
        if (!empty($cwa)) {
            Yii::$app->getSession()->setFlash('alert', [
                'body'    => Yii::t('frontend', "Not implemented yet."),
                'options' => ['class' => 'alert-warning']
                ]
            );
        }

        if (!Yii::$app->request->get('sort',0)) {
            $_GET['sort'] = '-id';
        }
        
        $searchModel  = new InvestmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',
                [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,         
        ]);
    }

    /**
     *
     * @param string $cwa
     * @return obj $swa
     */
    private function processBitcoin($cwa)
    {   
        $swa = Yii::$app->blockchain->getNewAddress($cwa);
        //[balance] => [address] => 1CTUApmGd92fQGZKaqxvxvVRKTXW1NYXwr [label] => ssss [total_received] => )

        if (!empty($swa->address)) {
            Yii::$app->getSession()->setFlash('alert',
            [
            'body'    => Yii::t('frontend',
                "Well done! Your personal wallet adress: <b> {$swa->address} </b>. Send money from your coin control pannel and we will double them"),
            'options' => ['class' => 'alert-success']
            ]
        );
        }
        else {
            Yii::$app->getSession()->setFlash('alert',
            [
            'body'    => Yii::t('frontend',
                "Service not aviable."),
            'options' => ['class' => 'alert-warning']
            ]
        );
        }

        return $swa;
    }

    public function actionInvestmentView($address)
    {
        if (empty($address)) {
            throw new NotFoundHttpException('Address can not be blank.');
        }

        $model = Yii::$app->blockchain->getAddress($address);
        
        if (empty($model->address)) {
            throw new NotFoundHttpException('The requested address does not exist.');
        }

        return $this->render('investment-view',['model' => $model]);
    }
}