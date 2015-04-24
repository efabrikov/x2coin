<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$array = ArrayHelper::toArray($model);
foreach ($array as $key => $value) :
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title" id="panel-title"><?= Html::encode($key) ?><a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
        </div>
        <div class="panel-body">
            <?php
            if (is_array($value)) {
                echo Html::encode(implode(', ', $value));
            } else {
                echo Html::encode($value);
            }
            ?>
        </div>
    </div>
<?php endforeach; ?>

