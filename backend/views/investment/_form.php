<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Investment */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="investment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'cwa')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'swa')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'tx_hash')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'pay_at')->textInput() ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'currency')->textInput(['maxlength' => 50]) ?>

    <?php echo $form->field($model, 'deposit_amount')->textInput() ?>

    <?php echo $form->field($model, 'pay_amount')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
