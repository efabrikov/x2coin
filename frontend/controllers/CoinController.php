<?php

namespace frontend\controllers;

class CoinController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'get-investment-ajax-table' => [
                'class'=> '\frontend\components\widgets\investment_ajax_table\action\InvestmentAjaxTableAction',
            ]
        ];
    }

    public function actionIndex()
    {     
        return $this->render('index');
    }
}