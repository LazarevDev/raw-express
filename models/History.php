<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class History extends ActiveRecord
{
    public static function tableName()
    {
        return 'history'; 
    }

    public function rules()
    {
        return [
            [['user_id', 'month_id', 'raw_type_id', 'tonnage_id', 'price'], 'required'],
            [['user_id', 'month_id', 'raw_type_id', 'tonnage_id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'user_id' => 'id Пользователя',
            'month_id' => 'id Месяца',
            'raw_type_id' => 'id Типа сырья',
            'tonnage_id' => 'id Тоннажа',
            'price' => 'Цена',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getMonth()
    {
        return $this->hasOne(Months::class, ['id' => 'month_id']);
    }

    public function getTonnage()
    {
        return $this->hasOne(Tonnages::class, ['id' => 'tonnage_id']);
    }

    public function getRawType()
    {
        return $this->hasOne(RawTypes::class, ['id' => 'raw_type_id']);
    }
}