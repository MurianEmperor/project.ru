<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $orders_id
 * @property string $time
 * @property string $components
 * @property float $price
 * @property string $def_reason
 * @property string $assist
 * @property string $mark
 *
 * @property Orders $orders
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders_id', 'time', 'components', 'price', 'def_reason', 'assist', 'mark'], 'required'],
            [['orders_id'], 'integer'],
            [['time'], 'safe'],
            [['components', 'def_reason', 'assist'], 'string'],
            [['price'], 'number'],
            [['mark'], 'string', 'max' => 255],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orders_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'Номер заявки',
            'time' => 'Время выполнения',
            'components' => 'Использованные запчасти',
            'price' => 'Стоимость',
            'def_reason' => 'Причина неисправности',
            'assist' => 'Результат починки',
            'mark' => 'Оценка клиента',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'orders_id']);
    }
}
