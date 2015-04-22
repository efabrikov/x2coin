<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-lg-1 well"><?= Yii::t('frontend','Currency') ?></div>
    <div class="col-lg-2 well"><?= Yii::t('frontend','Date') ?></div>
    <div class="col-lg-3 well"><?= Yii::t('frontend','Address') ?></div>
    <div class="col-lg-2 well"><?= Yii::t('frontend','Deposit') ?></div>
    <div class="col-lg-2 well"><?= Yii::t('frontend','Pay') ?></div>
    <div class="col-lg-2 well"><?= Yii::t('frontend','Time left') ?></div>
</div>
<div id="investment_ajax_table_rows" ajaxUrl="<?= Url::toRoute('get-investment-ajax-table', true)?>">
<?php echo $this->render('rows', ['models' => $models]); ?>
</div>