<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $equipment
 * @property string $cl_phone
 * @property string $coment
 * @property string $date_add
 * @property int $type_id
 * @property int $status_id
 * @property int $user_id
 *
 * @property OrderList[] $orderLists
 * @property Report[] $reports
 * @property Status $status
 * @property Type $type
 * @property User $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment', 'cl_phone', 'coment', 'type_id', 'status_id', 'user_id'], 'required'],
            [['coment'], 'string'],
            [['date_add'], 'safe'],
            [['date_end'], 'safe'],
            [['type_id', 'status_id', 'user_id'], 'integer'],
            [['equipment'], 'string', 'max' => 50],
            [['cl_phone'], 'string', 'max' => 11],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment' => 'Оборудование',
            'cl_phone' => 'Телефон',
            'coment' => 'Коментарий',
            'date_add' => 'Дата добавления',
            'date_end' => 'Дата окончания',
            'type_id' => 'Тип',
            'status_id' => 'Статус',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[OrderLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderLists()
    {
        return $this->hasMany(OrderList::class, ['orders_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Report::class, ['orders_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
