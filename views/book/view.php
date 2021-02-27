<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
?>
<div class="book-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'created_at',
            'author',
        ],
    ]) ?>

</div>
