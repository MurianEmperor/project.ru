<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderList $model */

$this->title = 'Create Order List';
$this->params['breadcrumbs'][] = ['label' => 'Order Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
