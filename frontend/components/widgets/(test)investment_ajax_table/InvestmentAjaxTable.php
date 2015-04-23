<?php

namespace frontend\components\widgets\investment_ajax_table;

use Yii;
use backend\models\Investment;

/**
 * Class InvestmentAjaxTable
 * required action:
 *   public function actions()
 *   {
 *       return [
 *           'get-investment-ajax-table' => [
 *               'class' => '\frontend\components\action\InvestmentAjaxTableAction',
 *           ]
 *       ];
 *   }
 *
 * in view:
 *
 * echo frontend\components\widgets\investment_ajax_table\InvestmentAjaxTable::widget()
 *
 * Return a ajex table based on investment db table 
 */
class InvestmentAjaxTable extends \yii\base\Widget
{
    /**
     * @var integer table rows
     */
    public $defaultRowCount = 20;

    /**
     *
     * @var boolean if return only table
     */
    public $onlyTable = false;

    /**
     * @return string
     */
    public function run()
    {
        if ($this->onlyTable) {
            return $this->getTable();
        }

        $this->view->registerJs($this->render('../js/loader.js'));

        return $this->render('main',
                [
                'models' => $this->getModels()
                ]
        );
    }

    protected function getTable()
    {
        return $this->render('rows',
                [
                'models' => $this->getModels()
                ]
        );
    }

    protected function getModels()
    {
        $models = Investment::find()
            ->where(['status' => Investment::STATUS_ACTIVE])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $models;
    }
}