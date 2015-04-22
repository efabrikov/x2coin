<?php

namespace frontend\components\widgets\investment_ajax_table\action;

use yii\base\Action;
use Yii;
use \frontend\components\widgets\investment_ajax_table\InvestmentAjaxTable;

/**
 * Class InvestmentAjaxTableAction 
 *
 * Example:
 *
 *   public function actions()
 *   {
 *       return [
 *           'get-investment-ajax-table'=>[
 *               'class'=>'\frontend\components\widgets\investment_ajax_table\action\InvestmentAjaxTableAction',
 *           ]
 *       ];
 *   }
 */
class InvestmentAjaxTableAction extends Action
{

    /**
     * @return mixed
     */
    public function run()
    {
        Yii::$app->response->data = InvestmentAjaxTable::widget([
                'onlyTable' => true
        ]);
        return Yii::$app->response;
    }
}