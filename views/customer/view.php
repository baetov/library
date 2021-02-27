<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
?>
<div class="customer-view">
 <div class="row">
     <div class="col-md-12">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h4 class="panel-title">Информация</h4>
             </div>
             <div class="panel-body" style="overflow-y: auto;">
                 <?= DetailView::widget([
                     'model' => $model,
                     'attributes' => [
                         'id',
                         'name',
                         'passport',
                         'phone',
                     ],
                 ]) ?>
             </div>
         </div>
     </div>
     <div class="col-md-12">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h4 class="panel-title">Забирал</h4>
             </div>
             <div class="panel-body" style="overflow-y: auto;">
                 <?= $this->render('@app/views/customer/output-index', [
                     'searchModel' => $outputModel,
                     'dataProvider' => $outputDataProvider,
                 ]) ?>
             </div>
         </div>
     </div>
     <div class="col-md-12">
         <div class="panel panel-primary">
             <div class="panel-heading">
                 <h4 class="panel-title">Приносил</h4>
             </div>
             <div class="panel-body" style="overflow-y: auto;">
                 <?= $this->render('@app/views/customer/receipt-index', [
                     'searchModel' => $receptionModel,
                     'dataProvider' => $receptionDataProvider,
                 ]) ?>
             </div>
         </div>
     </div>
 </div>


</div>
