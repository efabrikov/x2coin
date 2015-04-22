<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Investment */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Investment',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Investments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="investment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
