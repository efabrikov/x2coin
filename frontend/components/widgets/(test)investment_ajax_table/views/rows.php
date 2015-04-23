<?php foreach ($models as $key => $value) : ?>
<div class="row">
    <div class="col-lg-1 well"><?= $value->currency ?></div>
    <div class="col-lg-2 well"><?= $value->created_at ?></div>
    <div class="col-lg-3 well"><?= $value->cwa ?></div>
    <div class="col-lg-2 well"><?= $value->deposit_amount ?></div>
    <div class="col-lg-2 well"><?= $value->pay_amount ?></div>
    <div class="col-lg-2 well"><?= $value->pay_at - $value->created_at ?></div>
</div> 
<?php endforeach; ?>