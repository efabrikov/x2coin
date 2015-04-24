<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?= Html::beginForm([Url::toRoute('index')], 'post'); ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" name="cwa_bitcoin" class="form-control" placeholder="<?= Yii::t('frontend', 'enter your bitcoin wallet address'); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Send address</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" name="cwa_dogecoin" class="form-control" placeholder="<?= Yii::t('frontend', 'enter your dogecoin wallet address'); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Send address</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->

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
                $timeleft = $model->pay_at - Yii::$app->getFormatter()->asTimestamp(time());
                
                return ($timeleft > 0) ? gmdate('H:i:s', $timeleft) : 0;
            },            
        ],
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons'  => [
                'view' => function ($url, $model) {
                    $customurl = Yii::$app->getUrlManager()->createUrl(['coin/investment-view', 'address' => $model['swa']]);
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $customurl, ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                }
                ]
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

