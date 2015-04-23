<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?= Html::beginForm([Url::toRoute('index')], 'post',
            ['class' => 'form-inline']); ?>
        <?= Html::input('text', 'cwa', Yii::$app->request->post('cwa'),
            ['class' => 'form-control','placeholder'=>Yii::t('frontend','your wallet addres')]) ?>
        <?= Html::submitButton('Send address',
            ['class' => 'btn btn-md btn-primary', 'name' => 'hash-button']) ?>
        <?= Html::endForm() ?>
    </div>
</div>

<?php
$js = <<< JS
setInterval(
    function() {
        $.pjax.defaults.timeout = false;
        $.pjax.reload({container:'#coin-investment-gridview'});
    },
    5000);
JS;
$this->registerJs($js);
?>

<?php Pjax::begin(['id' => 'coin-investment-gridview']); ?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        //['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'currency',
            'label'     => Yii::t('frontend', 'Currency')
        ],
        [
            'attribute' => 'created_at',
            'label'     => Yii::t('frontend', 'Date'),
            'format'    => 'datetime'
        ],
        [
            'attribute' => 'cwa',
            'label'     => Yii::t('frontend', 'Address')
        ],
        [
            'attribute' => 'deposit_amount',
            'label'     => Yii::t('frontend', 'Deposit')
        ],
        [
            'attribute' => 'pay_amount',
            'label'     => Yii::t('frontend', 'Pay')
        ],
        [
            'label'     => Yii::t('frontend', 'Time left'),
            'attribute' => 'pay_at',
            'value'     => function ($model) {
                $timeleft = $model->pay_at - time();
                return ($timeleft > 0) ? $timeleft : 0;
            },
            'format' => 'time'
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
        ],
    ],
]);
?>
<?php Pjax::end(); ?>

