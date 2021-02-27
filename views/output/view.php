<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Output */
?>
<div class="output-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'book_id',
            'issue_date',
            'created_at',
            'user_id',
        ],
    ]) ?>

</div>
