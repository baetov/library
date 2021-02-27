<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
?>
<div class="user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'email:email',
            'name',
            'phone',
            'position',
//            'password_hash',
            'created_at',
            'is_company_super_admin:boolean',
            'is_deletable:boolean',
        ],
    ]) ?>

</div>
