<?php

use app\models\Customer;
use app\models\User;
use app\models\Book;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'customer_id',
        'content' => function($data){
            $customer = Customer::find()->where(['id' => $data->customer_id])->one();
            return $customer->name;
        },
        'filter' => ArrayHelper::map(Customer::find()->asArray()->all(), 'id', 'name'),
        'filterType' => 'dropdown',
        'filterWidgetOptions' => [
            'options' => ['prompt' => ''],
            'pluginOptions' => ['allowClear' => true],
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'book_id',
        'content' => function($data){
            $customer = Book::find()->where(['id' => $data->book_id])->one();
            return $customer->name;
        },
        'filter' => ArrayHelper::map(Book::find()->where(['status' => 1])->asArray()->all(), 'id', 'name'),
        'filterType' => 'dropdown',
        'filterWidgetOptions' => [
            'options' => ['prompt' => ''],
            'pluginOptions' => ['allowClear' => true],
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'user_id',
        'content' => function($data){
            $customer = User::find()->where(['id' => $data->user_id])->one();
            return $customer->name;
        },
        'filter' => ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name'),
        'filterType' => 'dropdown',
        'filterWidgetOptions' => [
            'options' => ['prompt' => ''],
            'pluginOptions' => ['allowClear' => true],
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'state',
    ],
     [
     'class'=>'\kartik\grid\DataColumn',
     'attribute'=>'created_at',
     ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   