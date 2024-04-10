<?php

use app\models\Report;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Отчеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отчет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'orders_id',
            'time',
            'components:ntext',
            'price',
            'def_reason:ntext',
            'assist:ntext',
            'mark',
            [
                'template' => '{view} {update}',

                'visibleButtons' => [
                    'delete' => function ($model, $key, $index) {
                        return Yii::$app->user->identity->isAdmin();
                    },
                ],
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Report $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
