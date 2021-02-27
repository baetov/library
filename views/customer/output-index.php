<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

?>
<?=GridView::widget([
    'id'=>'output-datatable',
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'book_id',
            'content' => function($data){
                $customer = \app\models\Book::find()->where(['id' => $data->book_id])->one();
                return $customer->name;
            },
        ],
        [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'created_at',
        ],
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'panel' => [
        'headingOptions' => ['style' => 'display: none;'],
        'after'=>'',
    ]
])?>