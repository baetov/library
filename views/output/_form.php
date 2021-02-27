<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Output */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="output-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
         ArrayHelper::map(\app\models\Customer::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'book_id')->dropDownList(
        ArrayHelper::map(\app\models\Book::find()->where(['status' => 0])->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'issue_date')->input('date') ?>


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
