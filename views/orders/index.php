<?php

use app\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin() ){
            echo Html::a('Подать заявку', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'equipment',
            'cl_phone',
            'coment:ntext',
            'date_add',
            'date_end',
            'type_id',
            'status_id',
            //'user_id',
            [
                'class' => ActionColumn::className(),

                'template' => '{view} {update}',

                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {
                        return Yii::$app->user->identity->isAdmin();
                    },
                ],

                'urlCreator' => function ($action, Orders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }

            ],

        ],
    ]); ?>


</div>
