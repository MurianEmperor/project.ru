<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_list".
 *
 * @property int $id
 * @property string $date_det_time
 * @property int $orders_id
 * @property int $catalog_id
 *
 * @property Catalog $catalog
 * @property Orders $orders
 */
class OrderList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_det_time'], 'safe'],
            [['orders_id', 'catalog_id'], 'required'],
            [['orders_id', 'catalog_id'], 'integer'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::class, 'targetAttribute' => ['catalog_id' => 'id']],
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
            'date_det_time' => 'Дата заказа',
            'orders_id' => 'Номер заявки',
            'catalog_id' => 'Номер запчасти',
        ];
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::class, ['id' => 'catalog_id']);
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
