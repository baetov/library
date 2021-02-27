<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reception */
?>
<div class="reception-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'book_id',
            'created_at',
            'user_id',
            'state',
        ],
    ]) ?>

</div>
