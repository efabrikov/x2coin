<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\InvestmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Investments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Investment',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cwa',
            'swa',
            'tx_hash',
            'created_at:datetime',
            'updated_at:datetime',
            'pay_at:datetime',
            'status',
            'currency',
            'deposit_amount',
            'pay_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
