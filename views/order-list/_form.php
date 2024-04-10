<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orders_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Orders::find()->all(), 'id', 'equipment'))?>

    <?= $form->field($model, 'catalog_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Catalog::find()->all(), 'id', 'name'))?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
