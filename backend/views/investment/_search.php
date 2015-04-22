<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\InvestmentSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="investment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cwa') ?>

    <?= $form->field($model, 'swa') ?>

    <?= $form->field($model, 'tx_hash') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'pay_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'deposit_amount') ?>

    <?php // echo $form->field($model, 'pay_amount') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
