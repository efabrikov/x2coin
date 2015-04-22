<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Investment */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Investment',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Investments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
